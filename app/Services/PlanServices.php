<?php

namespace App\Services;

use App\Models\Plan;

class PlanServices
{
    public function all()
    {
        return Plan::get();
    }
    public function getPlanName($id)
    {
        return Plan::getPlanById($id)->first()->name;
    }
    public function getPlanDuration($id)
    {
        return Plan::getPlanById($id)->first()->duration;
    }
    public function getPlanMinimumInvestment($id)
    {
        return Plan::getPlanById($id)->first()->minimum_investment;
    }
    public function getPlanRoi($id)
    {
        return Plan::getPlanById($id)->first()->roi;
    }
}
