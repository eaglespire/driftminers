<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
class PlanFacade extends Facade
{
   protected static function getFacadeAccessor()
   {
        return 'PlanServices';
   }
}
