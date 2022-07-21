<?php

namespace App\Helpers;

use App\Jobs\SubscriptionActivationJob;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\AwaitingSubscriptionVerfication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SubscriptionHelpers
{
    public static function validateDeposit(Request $request)
    {
        //call this method in a controller
        //find the minimum investment amount for a given plan
        $minimumAmount = PlanHelpers::planMinimumInvestment($request->plan_id);
        Validator::make($request->except('_token','_method'), [
            'amount'=>['required','numeric','min:'.$minimumAmount]
        ])->validate();
    }
   public static function subscribe(Request $request)
   {
       Subscription::create($request->only('user_id','plan_id','amount'));
       //grab the user and notify him and the admins
       $user = User::where('id', $request['user_id'])->first();
       //dd($user);
       $user->notify(new AwaitingSubscriptionVerfication($user));
       return true;
   }
   public static function checkUserSubscriptionStatus($id): bool
   {
       $res = Subscription::where('user_id',$id)->first();
       if ($res){
           return true;
       }
       return false;
   }
   public static function fetchUserSubscribedPlan($id)
   {
       return Subscription::with('plan','user')->whereUser_id($id)->first();
   }
   public static function fetchSubscribedUsers()
   {
       return Subscription::with('user','plan')->get();
   }
   public static function fetchSubscribedUser($subscriptionId)
   {
      return Subscription::with('user','plan')->whereId($subscriptionId)->first();
   }
   public static function activateSubscription($subscriptionId) : bool
   {
      /*
       * Find the subscription to activate
        * Set the start and end date as well
        */
       $subscription = Subscription::with('plan','user')->whereId($subscriptionId)->first();
       //check to see if the subscription is already active
       if ($subscription->confirm_subscription){
          return false;
       }
       //get the user
       $user = User::whereId($subscription->user_id)->first();
       $currentDate = Carbon::now();
       // convert the current date to string
       //$convertedDate = $currentDate->toDateString();
       //get the end date string representation
       $endDate = Carbon::now()->addDays($subscription->plan->duration);
       //$convertedEndDate = $endDate->toDateString();

       $subscription->update(['confirm_subscription'=>true,'start_date'=>$currentDate,'end_date'=>$endDate]);

       /*
        *  If the user already has a wallet, increment the balance
        */
       $userWallet = Wallet::where('user_id',$user->id)->first();
       if ($userWallet){
           //get the current balance
           $currentBalance = $userWallet->balance;
           $userWallet->update(['balance'=>$currentBalance + $subscription->amount]);
       }
       else{
           /*
          *   Set up a wallet for the user
          */
           WalletHelpers::buildWallet($subscription->user->id,$subscription->amount);
       }

       /*
        * Notify the admin and user via mail
        * that their subscription has been activated
        */
       $dataToSend = [
           'name'=>$subscription->user->name,
           'email'=>$subscription->user->email,
           'plan'=>$subscription->plan->name,
           'start_date'=>$subscription->start_date,
           'end_date'=>$subscription->end_date
       ];
       SubscriptionActivationJob::dispatch($user,$dataToSend);
       return true;
   }
   /*
    * Cancel the subscription
    * and opt the user out of the plan
    */
    public static function cancelSubscription($subscriptionId)
    {
        /*
         * Fetch the current plan of the user
         */
        $subscription = Subscription::with('user','plan')->whereId($subscriptionId)->first();
        if ($subscription){
            $subscription->delete();
            return true;
        }
        return false;

    }
}
