<?php

namespace App\Repositories;

use App\Helpers\SubscriptionHelpers;
use App\Interfaces\SubscriptionInterface;
use App\Jobs\NewDepositJob;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
class SubscriptionRepository implements SubscriptionInterface
{

    public function subscribe(Request $request): bool
    {
        $subscribe = SubscriptionHelpers::subscribe($request);
        if ($subscribe){
            //get the user
            $user = User::with('subscription')->where('id', $request->user_id)->first();
            //Notify the admin via email of this new deposit
            //Also notify the user of this deposit via email
            //build data to send
            $dataToSend = [
                'depositorName'=>$user->name,
                'depositorEmail'=>$user->email,
                'amountDeposited'=>$request->amount,
                'planType'=>$user->subscription->plan->name,
                'planDuration'=>$user->subscription->plan->duration,
                'planRoi'=>$user->subscription->plan->roi
            ];
            NewDepositJob::dispatch($user, $dataToSend);
            return true;
        }
        return false;
    }

    public function unsubscribe($id)
    {
        // TODO: Implement unsubscribe() method.
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function checkUserHasSubscribed($id)
    {
        return SubscriptionHelpers::checkUserSubscriptionStatus($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function userSubscription($id)
    {
        return SubscriptionHelpers::fetchUserSubscribedPlan($id);
    }

    /**
     * @return mixed
     */
    public function getAllSubscribedUsers(): mixed
    {
        return SubscriptionHelpers::fetchSubscribedUsers();
    }

    /**
     * @param $subscriptionId
     * @return mixed
     */
    public function getSubscribedUser($subscriptionId)
    {
        return SubscriptionHelpers::fetchSubscribedUser($subscriptionId);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function activateSubscription($id)
    {
        return SubscriptionHelpers::activateSubscription($id);
    }

    /**
     * @param $subscriptionId
     * @return mixed
     */
    public function cancelSubscription($subscriptionId)
    {
        return SubscriptionHelpers::cancelSubscription($subscriptionId);
    }
}
