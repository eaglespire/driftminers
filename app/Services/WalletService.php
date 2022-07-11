<?php

namespace App\Services;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Wallet;

class WalletService
{
   public function currentBalance($userId)
   {
       $user = User::with('wallet')->whereId($userId)->first();
       return $user?->wallet?->balance;
   }
   public function dailyProfit($subscriberId): bool
   {
       $subscriber = Subscription::with('user','plan')->whereId($subscriberId)->first();
       //get the user
       $user = User::whereId($subscriber->user_id)->first();
       //fetch the roi
       $roi = $subscriber->plan->roi;
       //fetch the duration
       $duration = $subscriber->plan->duration;
       //fetch the minimum investment
       $investment = $subscriber->plan->minimum_investment;
       $profit = $this->calculateIncrement($investment,$roi,$duration);
       if ($this->addProfitToWallet($user->id,$profit)){
           return true;
       }
       return false;
   }
   private function addProfitToWallet($userId,$profit): bool|int
   {
       //get the user wallet
       $userWallet = Wallet::with('user')->where('user_id',$userId)->first();
       //get the current balance
       $currentBalance = $userWallet->balance;
      return $userWallet->update(['balance' => $currentBalance + $profit]);
   }
   private function calculateIncrement($investment,$roi,$duration): float|int
   {
        $profit = ($investment * $roi * $duration) / 100;
        return $profit / $duration;
   }
   public function lastMiningDate($userId)
   {
       //get the wallet associated with this user
       $userWallet = Wallet::where('user_id',$userId)->first();
       return $userWallet->updated_at->toFormattedDateString();
   }
}

