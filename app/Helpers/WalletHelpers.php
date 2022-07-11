<?php

namespace App\Helpers;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Cache;

class WalletHelpers
{
   public static function getUserWallet($userId)
   {
       return Wallet::whereId($userId)->first();
   }
   public static function buildWallet($userId,$amount)
   {
       return Wallet::create([
           'user_id'=>$userId,
           'balance'=>$amount
       ]);
   }
   public static function buildProfit($walletId)
   {
       //
   }
}
