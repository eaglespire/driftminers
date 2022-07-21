<?php

use App\Models\Subscription;

if (!function_exists('get_copyright_date')){
    function get_copyright_date(): string
    {
        $creationYear = '2019';
        $currentYear = date('Y');
        return "$creationYear - $currentYear";
    }
}

if (!function_exists('role_checker')){
    function role_checker(): string
    {
        if (auth()->user()->is_admin){
            return route('admin_home');
        } elseif (!auth()->user()->is_admin){
            return route('client.profile');
        }
        return route('login');
    }
}

if (!function_exists('user_has_subscribed')){
    function  user_has_subscribed(): bool
    {
        if (Subscription::whereUser_id(auth()->id())){
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

