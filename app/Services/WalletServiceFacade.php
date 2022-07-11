<?php

namespace App\Services;
 use Illuminate\Support\Facades\Facade;

class WalletServiceFacade extends Facade
{
     protected static function getFacadeAccessor()
     {
         return 'wallet';
     }
}
