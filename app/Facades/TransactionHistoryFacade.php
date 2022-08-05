<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TransactionHistoryFacade extends Facade
{
   protected static function getFacadeAccessor()
   {
        return 'TransactionHistoryServices';
   }
}
