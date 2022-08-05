<?php

use App\Facades\WalletFacade;
use App\Models\Subscriber;

if (!function_exists('get_copyright_date')){
    function get_copyright_date(): string
    {
        $creationYear = '2019';
        $currentYear = date('Y');
        return "$creationYear - $currentYear";
    }
}

if (!function_exists('role_checker')){
    /*
     * This function checks the user role
     */
    function role_checker(): string
    {
        if (auth()->user()->is_admin){
            return route('admin_home');
        } elseif (!auth()->user()->is_admin){
            return route('client.welcome');
        }
        return route('login');
    }
}

if (!function_exists('user_has_subscribed')){
    function  user_has_subscribed(): bool
    {
        if (Subscriber::whereUser_id(auth()->id())){
            return true;
        }
        return false;
    }
}
if(!function_exists('user_can_deposit')){
    function user_can_deposit(): bool
    {
        $plansCount = count(\App\Helpers\PlanHelpers::getAllPlans());
        if ($plansCount != 0 && user_has_subscribed()){
            return true;
        }
        return false;
    }
}

if (!function_exists('already_mined')) {
    function already_mined($userId,$data): ?string
    {
        /*
         * This function basically checks to see if the admin
         * has mined for a certain day and it disables the mining button if true
         */
       $miningDateValues =  WalletFacade::getMiningDateValues($userId);
       if ($miningDateValues != null){
           $newCollection = collect([]);
           foreach ($miningDateValues as $value){
               $newCollection->push($value->mining_date_value);
           }
           if ($newCollection->contains($data)){
               return 'disabled';
           }
           return null;
       }
       return null;
    }
}

if (!function_exists('get_subscriber_route')){
    function get_subscriber_route($userId): string
    {
        //get the user
        $user = \App\Models\User::where('id',$userId)->first();
         return route('subscriber',$user->subscriber->id) ?? route('users.show', $user->id);
    }
}

