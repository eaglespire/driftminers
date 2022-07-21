<?php

namespace App\Facades;
use App\Services\SubscriptionService;
use Illuminate\Support\Facades\Facade;

class SubscriptionServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SubscriptionService';
    }
}
