<?php

namespace App\Facades;
use App\Services\SubscriptionServices;
use Illuminate\Support\Facades\Facade;

class SubscriptionFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SubscriptionServices';
    }
}
