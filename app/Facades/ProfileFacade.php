<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ProfileFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProfileServices';
    }
}
