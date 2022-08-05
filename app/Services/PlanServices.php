<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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

    /**
     * @throws ValidationException
     */
    public function getSinglePlan($id)
    {
        try {
            return Plan::findOrFail($id);
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['NotFound'=>'PlanFacade does not exist']);
        }
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
