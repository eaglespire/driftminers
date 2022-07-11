<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SubscriptionService
{
   public function startDate(): string
   {
       // get the user
       $user = Auth::user();
       return $user->subscription?->start_date?->toFormattedDateString() ?? 'NA';
   }
    public function endDate(): string
    {
        // get the user
        $user = Auth::user();
        return $user->subscription?->end_date?->toFormattedDateString() ?? 'NA';
    }
    public function status():bool
    {
        // get the user
        $user = Auth::user();
        return $user->subscription?->confirm_subscription;
    }
    public function planName($userId) : mixed
    {
        //get the user
        $user = User::whereId($userId)->first();
        return $user->subscription?->plan->name;
    }
    public function planDescription($userId) : mixed
    {
        //get the user
        $user = User::whereId($userId)->first();
        return $user->subscription?->plan->name;
    }
}
