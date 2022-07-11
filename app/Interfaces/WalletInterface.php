<?php

namespace App\Interfaces;

use App\Models\Plan;
use App\Models\User;

interface WalletInterface
{
    public function setUpWallet(User $user, Plan $plan, $amount);
    public function getWallet($id);
}
