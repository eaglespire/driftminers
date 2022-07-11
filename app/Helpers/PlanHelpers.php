<?php

namespace App\Helpers;

use App\Models\Plan;

class PlanHelpers
{
    public static function getAllPlans()
    {
        return Plan::get();
    }
   public static function planName($id)
   {
      return Plan::getPlanById($id)->first()->name;
   }
    public static function planDuration($id)
    {
        return Plan::getPlanById($id)->first()->duration;
    }
    public static function planMinimumInvestment($id)
    {
        return Plan::getPlanById($id)->first()->minimum_investment;
    }
    public static function planRoi($id)
    {
        return Plan::getPlanById($id)->first()->roi;
    }
}
