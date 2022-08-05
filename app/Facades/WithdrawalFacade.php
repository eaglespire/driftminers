<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class WithdrawalFacade extends Facade
{
  protected static function getFacadeAccessor()
  {
      return 'WithdrawalServices';
  }
}
