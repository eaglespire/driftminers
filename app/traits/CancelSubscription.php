<?php

namespace App\traits;

use App\Models\MiningDate;
use App\Models\Subscriber;
use App\Models\User;
use App\Notifications\admin\AdminDBSubscriptionCancelled;
use App\Notifications\client\ClientDBSubscriptionCancelled;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

trait CancelSubscription
{
    public function deactivateSubscription($subscriberId): bool
    {
        try {
           //Fetch the subscriber
            $subscriber = Subscriber::with('user','plan')->whereId($subscriberId)->firstOrFail();
            //notify the user and the admins
            $subscriber->user->notify(new ClientDBSubscriptionCancelled($subscriber->user));
            // $subscription->user->notify(new ClientMailSubscriptionCancelled($subscription->user));
            $admins = User::where('is_admin',1)->get();
            Notification::send($admins, new AdminDBSubscriptionCancelled($subscriber->user));
            // Notification::send($admins, new AdminMailSubscriptionCancelled($subscription->user));
            $subscriber->delete();
            //remove the mining dates from the database
            //fetch this user's mining dates
            MiningDate::where('user_id',$subscriber->user->id)->delete();
            return true;
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            return false;
        }
    }
}
