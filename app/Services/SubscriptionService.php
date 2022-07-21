<?php

namespace App\Services;

use App\Exceptions\SubscriptionException;


use App\Models\Subscription;
use App\Models\User;
use App\Models\Wallet;

use App\Notifications\admin\AdminDBSubscriptionApproved;
use App\Notifications\admin\AdminDBSubscriptionCancelled;
use App\Notifications\admin\AdminDBSubscriptionRejected;
use App\Notifications\admin\AdminDBSubscriptionRequest;
use App\Notifications\admin\AdminMailSubscriptionApproved;
use App\Notifications\admin\AdminMailSubscriptionCancelled;
use App\Notifications\admin\AdminMailSubscriptionRejected;
use App\Notifications\admin\AdminMailSubscriptionRequest;
use App\Notifications\client\ClientDBSubscriptionApproved;
use App\Notifications\client\ClientDBSubscriptionCancelled;
use App\Notifications\client\ClientDBSubscriptionRejected;
use App\Notifications\client\ClientDBSubscriptionRequest;
use App\Notifications\client\ClientMailSubscriptionApproved;
use App\Notifications\client\ClientMailSubscriptionCancelled;
use App\Notifications\client\ClientMailSubscriptionRejected;
use App\Notifications\client\ClientMailSubscriptionRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use PlanServices;
use UserWallet;

class SubscriptionService
{
   public function startDate(): string
   {
       // get the user
       $user = Auth::user();
       return $user->subscription?->start_date?->toFormattedDateString() ?? 'NA';
   }
    public function endDate(): string
    {
        // get the user
        $user = Auth::user();
        return $user->subscription?->end_date?->toFormattedDateString() ?? 'NA';
    }
    public function status():bool
    {
        // get the user
        $user = Auth::user();
        return $user->subscription?->confirm_subscription;
    }
    public function planName($userId) : mixed
    {
        //get the user
        $user = User::whereId($userId)->first();
        //return 'yes';
        return $user->subscription?->plan->name;
    }
    public function planDescription($userId) : mixed
    {
        //get the user
        $user = User::whereId($userId)->first();
        return $user->subscription?->plan->name;
    }
    public function checkUserSubscriptionStatus($id): bool
    {
        $res = Subscription::where('user_id',$id)->first();
        if ($res){
            return true;
        }
        return false;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateDeposit(Request $request): void
    {
        //call this method in a controller
        //find the minimum investment amount for a given plan
        $minimumAmount = PlanServices::getPlanMinimumInvestment($request->plan_id);
        Validator::make($request->except('_token','_method'), [
            'amount'=>['required','numeric','min:'.$minimumAmount]
        ])->validate();
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function subscribe(Request $request)
    {
        //check if the user has inputted the actual amount
        $this->validateDeposit($request);

        //check if the user has already subscribed
        if ($this->checkUserSubscriptionStatus(Auth::id())) {
            throw ValidationException::withMessages(['duplicate_subscription'=>'You currently have an active or inactive plan']);
            //dd('Yes');
            //return back()->with('error','OOOOOP');
           // Alert::error('Error','You currently have a plan running');
           // return back();
        }
        try {
            Subscription::create($request->only('user_id','plan_id','amount'));
            $user = User::where('id', $request['user_id'])->first();
            //notify the user
            $user->notify(new ClientMailSubscriptionRequest($user));
            $user->notify(new ClientDBSubscriptionRequest($user));
            //notify the admins
            $admins = User::where('is_admin',1)->get();
            Notification::send($admins, new AdminMailSubscriptionRequest($user));
            Notification::send($admins, new AdminDBSubscriptionRequest($user));
            //todo configure email later
            return true;
        } catch (SubscriptionException $exception){
            return false;
        }
    }

    public function fetchUserSubscribedPlan($id)
    {
        return Subscription::with('plan','user')->whereUser_id($id)->first();
    }
    public function fetchSubscribedUsers()
    {
        return Subscription::with('user','plan')->get();
    }
    public function fetchSubscribedUser($subscriptionId)
    {
        return Subscription::with('user','plan')->whereId($subscriptionId)->first();
    }
    public function activateSubscription($subscriptionId) : bool
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
            UserWallet::buildWallet($subscription->user->id,$subscription->amount);
        }

        /*
         * Notify the admin and user
         * that subscription has been activated
         */
            $user->notify(new ClientMailSubscriptionApproved($user));
            $user->notify(new ClientDBSubscriptionApproved($user));
            // Get the admins
        $admins = User::where('is_admin',1)->get();
        Notification::send($admins, new AdminMailSubscriptionApproved($user));
        Notification::send($admins, new AdminDBSubscriptionApproved($user));
        return true;
    }
    /*
     * Cancel the subscription
     * and opt the user out of the plan
     */
    public function cancelSubscription($subscriptionId)
    {
        /*
         * Fetch the current plan of the user
         */
        $subscription = Subscription::with('user','plan')->whereId($subscriptionId)->first();
        if ($subscription){
            //notify the user and the admins
            $subscription->user->notify(new ClientDBSubscriptionCancelled($subscription->user));
            $subscription->user->notify(new ClientMailSubscriptionCancelled($subscription->user));
            $admins = User::where('is_admin',1)->get();
            Notification::send($admins, new AdminDBSubscriptionCancelled($subscription->user));
            Notification::send($admins, new AdminMailSubscriptionCancelled($subscription->user));
            $subscription->delete();
            return true;
        }
        return false;
    }
    public function rejectSubscriptionRequest($subscriptionId)
    {
        $subscription = Subscription::with('user','plan')->whereId($subscriptionId)->first();
        if ($subscription){
            //notify the subscriber and the admins of this rejection
            //dd($subscription->user);
            $subscription->user->notify(new ClientDBSubscriptionRejected($subscription->user));
            $subscription->user->notify(new ClientMailSubscriptionRejected($subscription->user));
            $admins = User::where('is_admin',1)->get();
            Notification::send($admins, new AdminDBSubscriptionRejected($subscription->user));
            Notification::send($admins, new AdminMailSubscriptionRejected($subscription->user));

            $subscription->delete();
            return true;
        }
        return false;
    }

}
