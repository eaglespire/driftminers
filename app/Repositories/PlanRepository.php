<?php

namespace App\Repositories;

use App\Interfaces\PlanRepositoryInterface;
use App\Models\Plan;

class PlanRepository implements PlanRepositoryInterface
{

    public function getAllPlans()
    {
        return Plan::get();
    }

    public function getPlanById($planId)
    {
        return Plan::findOrFail($planId);
    }

    public function deletePlan($planId)
    {
        if (Plan::destroy($planId)){
            return true;
        }
        return false;
    }

    public function createPlan(array $planDetails)
    {
        if (Plan::create($planDetails)){
           return true;
        }
        return false;
    }

    public function updatePlan($planId, $newPlanDetails)
    {
        if (Plan::whereId($planId)->update($newPlanDetails)){
            return true;
        }
        return false;
    }
}
