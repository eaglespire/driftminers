<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
class PlanServiceFacade extends Facade
{
   protected static function getFacadeAccessor()
   {
        return 'PlanServices';
   }
}
