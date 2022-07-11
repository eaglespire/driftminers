<?php

namespace App\Interfaces;

interface PlanRepositoryInterface
{
   public function getAllPlans();
   public function getPlanById($planId);
   public function deletePlan($planId);
   public function createPlan(array $planDetails);
   public function updatePlan($planId, $newPlanDetails);
}
