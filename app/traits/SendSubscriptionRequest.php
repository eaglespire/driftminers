<?php

namespace App\traits;

use App\Exceptions\SubscriptionException;
use App\Models\Subscriber;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Notifications\admin\AdminDBSubscriptionRequest;
use App\Notifications\client\ClientDBSubscriptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;


trait SendSubscriptionRequest
{
     public function onboard(Request $request) : bool
     {
         try {
             Subscriber::create($request->only('user_id','plan_id','amount'));
             //register this withdrawal in the transaction histories table
             TransactionHistory::create(['user_id'=>$request['user_id'],'amount'=>$request['amount'],'type'=>'deposit','status'=>'pending']);
             $user = User::where('id', $request['user_id'])->first();
             //notify the user
             //$user->notify(new ClientMailSubscriptionRequest($user));
             $user->notify(new ClientDBSubscriptionRequest($user));
             //notify the admins
             $admins = User::where('is_admin',1)->get();
             // Notification::send($admins, new AdminMailSubscriptionRequest($user));
             Notification::send($admins, new AdminDBSubscriptionRequest($user));
             //todo configure email later
             return true;
         } catch (SubscriptionException $exception){
             Log::error($exception->getMessage());
             return false;
         }
     }
}
