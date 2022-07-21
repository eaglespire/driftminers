<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class UserServicesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'UserServices';
    }
}
