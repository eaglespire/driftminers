<?php

namespace App\Services;
use App\Models\Subscriber;
use App\Models\User;
use App\traits\ActivateSubscriptionRequest;
use App\traits\CancelSubscription;
use App\traits\RejectSubscriptionRequest;
use App\traits\SendSubscriptionRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Facades\PlanFacade;


class SubscriptionServices
{
    use CancelSubscription, SendSubscriptionRequest, ActivateSubscriptionRequest, RejectSubscriptionRequest;
    /**
     * @throws ValidationException
     */
    public function getSubscribedUser($subscriptionId)
    {
        try {
            return Subscriber::with('user','plan')->whereId($subscriptionId)->firstOrFail();
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['notFound'=>'Subscriber not found']);
        }
    }
    public function getSubscribedUsers() : array|\Illuminate\Database\Eloquent\Collection
    {
        return Subscriber::with('user','plan')->get();
    }
    public function checkUserHasSubscribed($userId) : bool
    {
        try {
          Subscriber::where('user_id',$userId)->firstOrFail();
          return true;
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            return false;
        }
    }
    public function subscriptionIsActive($userId) : bool
    {
        $subscribedUser = Subscriber::where('user_id',$userId)->first();
        if ($subscribedUser?->confirm_subscription){
            return true;
        }
        return false;
    }
   public function startDate(): string
   {
       // get the user
       $user = Auth::user();
       return $user->subscriber?->start_date?->toFormattedDateString() ?? 'NA';
   }
    public function endDate(): string
    {
        // get the user
        $user = Auth::user();
        return $user->subscriber?->end_date?->toFormattedDateString() ?? 'NA';
    }
    public function status():bool
    {
        // get the user
        $user = Auth::user();
        return $user->subscriber?->confirm_subscription;
    }
    public function planName($userId) : mixed
    {
        //get the user
        $user = User::whereId($userId)->first();
        //return 'yes';
        return $user->subscriber?->plan->name;
    }
    public function planRoi($userId) : mixed
    {
        //get the user
        $user = User::whereId($userId)->first();
        //return 'yes';
        return $user->subscriber?->plan->roi;
    }
    public function planDescription($userId) : mixed
    {
        //get the user
        $user = User::whereId($userId)->first();
        return $user->subscriber?->plan->name;
    }
    public function planMinimumInvestment($userId) : mixed
    {
        //get the user
        $user = User::whereId($userId)->first();
        return $user->subscriber?->plan->minimum_investment;
    }
    public function checkUserSubscriptionStatus($id): bool
    {
        $res = Subscriber::where('user_id',$id)->first();
        if ($res){
            return true;
        }
        return false;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateDeposit(Request $request): void
    {
        //call this method in a controller
        //find the minimum investment amount for a given plan
        $minimumAmount = PlanFacade::getPlanMinimumInvestment($request->plan_id);
        Validator::make($request->except('_token','_method'), [
            'amount'=>['required','numeric','min:'.$minimumAmount]
        ])->validate();
    }
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function fetchUserSubscribedPlan($id)
    {
        return Subscriber::with('plan','user')->whereUser_id($id)->first();
    }
    /**
     * @throws ValidationException
     */
    public function subscribe(Request $request): bool
    {
        //check if the user has inputted the actual amount
        $this->validateDeposit($request);
        //check if the user has already subscribed
        if ($this->checkUserSubscriptionStatus(Auth::id())) {
            throw ValidationException::withMessages(['duplicate_subscription'=>'You currently have an active or inactive plan']);
        }
        return $this->onboard($request);
    }
    public function activateSubscription($subscriptionId) : bool
    {
        return $this->activateOnboardRequest($subscriptionId);
    }
    public function cancelSubscription($subscriberId): bool
    {
        return $this->deactivateSubscription($subscriberId);
    }
    public function rejectSubscriptionRequest($subscriptionId,$message): bool
    {
       return $this->rejectSubscription($subscriptionId,$message);
    }

}
