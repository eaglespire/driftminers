<?php

namespace App\traits;

use App\Facades\WalletFacade;
use App\Models\Subscriber;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\admin\AdminDBSubscriptionApproved;
use App\Notifications\client\ClientDBSubscriptionApproved;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

trait ActivateSubscriptionRequest
{
    public function activateOnboardRequest($subscriberId) : bool
    {
        try {
            //fetch the subscriber to activate
            $subscription = Subscriber::with('plan','user')->whereId($subscriberId)->firstOrFail();
           // dd($subscription);
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            return false;
        }
        //dd($subscription->confirm_subscription);
        //check to see if the subscription is already active
        if ($subscription->confirm_subscription){
            return false;
        }
        //dd($subscription->user_id);
        try {
            //get the user
            $user = User::where('id',$subscription->user_id)->firstOrFail();
           // dd($userWallet);
            //dd($user);
        }  catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            return false;
        }

       // dd($userWallet);
        $currentDate = Carbon::now();
        // convert the current date to string
        //$convertedDate = $currentDate->toDateString();
        //get the end date string representation
        $endDate = Carbon::now()->addDays($subscription->plan->duration);

        if (Wallet::where('user_id',$user->id)->exists()){
           // dd('It Exists');
            $userWallet = Wallet::where('user_id',$user->id)->first();
            //get the current balance
            $currentBalance = $userWallet->balance;
            $userWallet->update(['balance'=>$currentBalance + $subscription->amount]);
        } else{
            /*
          *   Set up a wallet for the user
          */
           WalletFacade::buildWallet($user->id,$subscription->amount);
        }

        //$convertedEndDate = $endDate->toDateString();
        $subscription->update(['confirm_subscription'=>true,'start_date'=>$currentDate,'end_date'=>$endDate]);
        //register this deposit in the transaction histories table
        TransactionHistory::create(['user_id'=>$user->id,'amount'=>$subscription->amount,'type'=>'deposit','status'=>'completed']);

        // $user->notify(new ClientMailSubscriptionApproved($user));
        $user->notify(new ClientDBSubscriptionApproved($user));
        // Get the admins
        $admins = User::where('is_admin',1)->get();
        //Notification::send($admins, new AdminMailSubscriptionApproved($user));
        Notification::send($admins, new AdminDBSubscriptionApproved($user));
        return true;
    }
}
