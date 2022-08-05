<?php

namespace App\traits;

use App\Models\Subscriber;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Notifications\admin\AdminDBSubscriptionRejected;
use App\Notifications\client\ClientDBSubscriptionRejected;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

trait RejectSubscriptionRequest
{
   public function rejectSubscription($subscriberId,$message) : bool
   {
       try {
           $subscriber = Subscriber::with('user','plan')->whereId($subscriberId)->firstOrFail();
           //notify the subscriber and the admins of this rejection
           //dd($subscription->user);
           $subscriber->user->notify(new ClientDBSubscriptionRejected($subscriber->user,$message));
           //register this deposit in the transaction histories table
           TransactionHistory::create(['user_id'=>$subscriber->user->id(),'amount'=>$subscriber->amount,'type'=>'deposit','status'=>'rejected']);
           // $subscription->user->notify(new ClientMailSubscriptionRejected($subscription->user,$message));
           try {
               $admins = User::where('is_admin',1)->get();
           } catch (\Exception $exception){
               Log::error($exception->getMessage());
               return false;
           }
           Notification::send($admins, new AdminDBSubscriptionRejected($subscriber->user));
           // Notification::send($admins, new AdminMailSubscriptionRejected($subscription->user));
           $subscriber->delete();
           return true;
       } catch (ModelNotFoundException $exception){
           Log::error($exception->getMessage());
           return false;
       }
   }
}
