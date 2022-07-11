<?php

namespace App\Interfaces;
use Illuminate\Http\Request;

interface SubscriptionInterface
{
  public function subscribe(Request $request);
  public function unsubscribe($id);
  public function checkUserHasSubscribed($id);
  public function userSubscription($id);
  public function getAllSubscribedUsers();
  public function getSubscribedUser($subscriptionId);
  public function activateSubscription($id);
  public function cancelSubscription($subscriptionId);
}
