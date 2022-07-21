<?php

namespace App\Http\Controllers;

use App\Interfaces\DepositInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\SubscriptionInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use UserSubscription;

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
    public function welcome()
    {
        return view('client.home');
    }
    public function profile()
    {
         //dd(Auth::user()->notifications[0]['data']);
        $plans = $this->planRepository->getAllPlans();
        $subscription = $this->subscription->getSubscribedUser(auth()->id());
        //dd($subscription);
        return view('client.profile',compact('plans','subscription'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */

    public function subscribeToPlan(Request $request)
    {
        if (UserSubscription::subscribe($request)){
            Alert::success('Success','You have subscribed successfully');
            return back();
        }
        Alert::error('Error','Ooops!!!, Something went wrong');
        return back();
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */

        public function settings()
        {
            return view('client.settings');
        }
    public function activePlan()
    {
        return view('client.active');
    }
    public function withdrawal()
    {
        return view('client.withdrawal');
    }
    public function allPlans()
    {
        return view('client.plans');
    }
    public function accountBalance()
    {
        return view('client.account');
    }
    public function notifications()
    {
        return view('client.notifications');
    }
    public function transactions()
    {
        return view('client.transactions');
    }
    public function subscribe()
    {
        return view('client.subscribe');
    }

}
