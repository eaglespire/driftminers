<?php

namespace Client\Controllers;

use App\Helpers\DepositHelpers;
use App\Helpers\SubscriptionHelpers;
use App\Http\Controllers\Controller;
use App\Interfaces\DepositInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\SubscriptionInterface;
use App\Models\Plan;
use App\Models\Subscription;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    protected SubscriptionInterface $subscription;
    protected PlanRepositoryInterface $planRepository;
    protected DepositInterface $depositRepository;

    public function __construct(
        SubscriptionInterface $subscription,
        PlanRepositoryInterface $planRepository,
        DepositInterface $depositRepository,
    )
    {
        $this->middleware(['auth','role.user']);
        $this->subscription = $subscription;
        $this->planRepository = $planRepository;
        $this->depositRepository = $depositRepository;
    }
    public function profile()
    {

        $plans = $this->planRepository->getAllPlans();
        $subscription = $this->subscription->getSubscribedUser(auth()->id());
        //dd($subscription);
        return view('client_profile',compact('plans','subscription'));
    }
    public function plans()
    {
        return view('client_plans');
    }
    public function bonuses()
    {
        return view('client_bonuses');
    }
    public function withdrawal()
    {
        return view('client_withdrawals');
    }
    public function deposit()
    {
        $plans = $this->planRepository->getAllPlans();
        return view('client_deposit', compact('plans'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function subscribeToPlan(Request $request)
    {
        //check to see if user has already subscribed to any other plan
       // $subscribedUser =
        if ($this->subscription->checkUserHasSubscribed(Auth::id())) {
            Alert::error('Error','You currently have a plan running');
            return back();
        }
        /*
         * This checks to see if the user has input the minimum amount
         */
        SubscriptionHelpers::validateDeposit($request);
        if ($this->subscription->subscribe($request)){
            Alert::success('Success','You have subscribed successfully');
            return back();
        }
        Alert::error('Error','Ooops!!!, Something went wrong');
        return back();
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function makeDeposit(Request $request)
    {
        //checks to see if the user has already made a deposit
        if (DepositHelpers::userHasDeposited($request->user_id)){
            Alert::error('Error','Ooops!!!,You cannot make additional deposits at this moment');
            return back();
        }
        //validate the deposit to see if it meets the minimum amount to be
        // deposited
        DepositHelpers::validateDeposit($request);
        if ($this->depositRepository->storeDeposit($request)){
           return back()->with('success','Awaiting acceptance from the admin');
        }
        return back()->with('error','Ooops!!!, Something went wrong');
    }
}
