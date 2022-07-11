<?php

namespace App\Services;
use Illuminate\Support\Facades\Facade;
class SubscriptionServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'subscription';
    }
}
