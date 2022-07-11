<?php

namespace App\Repositories;

use App\Helpers\WalletHelpers;
use App\Interfaces\WalletInterface;
use App\Models\Wallet;
use App\Models\User;
use App\Models\Plan;

class WalletRepository implements WalletInterface
{
    public function setUpWallet(User $user,Plan $plan, $amount)
    {
        return WalletHelpers::buildWallet($user,$plan,$amount);
    }

    public function getWallet($id)
    {
        return WalletHelpers::getUserWallet($id);
    }
}
