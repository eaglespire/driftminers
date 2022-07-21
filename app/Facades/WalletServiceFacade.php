<?php

namespace App\Facades;
 use Illuminate\Support\Facades\Facade;

 class WalletServiceFacade extends Facade
{
     protected static function getFacadeAccessor()
     {
         return 'WalletService';
     }
}
