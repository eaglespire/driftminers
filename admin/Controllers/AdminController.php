<?php

namespace Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\DepositInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\SubscriptionInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use UserWallet;


class AdminController extends Controller
{
    private PlanRepositoryInterface $planRepository;
    private SubscriptionInterface $subscription;
    private DepositInterface $deposit;
    public function __construct(PlanRepositoryInterface $planRepository, SubscriptionInterface $subscription, DepositInterface $deposit)
    {
        $this->middleware(['auth','role.admin']);
        $this->planRepository = $planRepository;
        $this->subscription = $subscription;
        $this->deposit = $deposit;
    }
    public function home()
    {
        return view('admin_home');
    }
    public function create_plans()
    {
        return view('create_plans');
    }
    public function all_plans()
    {
        return view('all_plans', [
            'plans'=>$this->planRepository->getAllPlans()
        ]);
    }
    public function edit_plan($planId)
    {
        return view('edit_plan',[
           'plan'=>$this->planRepository->getPlanById($planId)
        ]);
    }
    public function update_plan($planId, Request $request)
    {
        $request->validate(
            [
                'name'=>['required',Rule::unique('plans')->ignore($planId)],
                'description'=>'required',
                'roi'=>'required|numeric',
                'minimum_investment'=>'required|numeric',
                'duration'=>'required|numeric'
            ]
        );
        $planDetails = $request->only([
          'name','description','roi','duration','minimum_investment'
        ]);
        if ($this->planRepository->updatePlan($planId,$planDetails)){
            Alert::success('Success','Updated Successfully');
        }else{
            Alert::error('Error','Something went wrong');
        }
        return back();
    }
    public function store_plan(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'description'=>'required',
                'roi'=>'required|numeric',
                'minimum_investment'=>'required|numeric',
                'duration'=>'required|numeric'
            ]
        );
        $newPlanDetails = $request->all();
        $retVal = $this->planRepository->createPlan($newPlanDetails);
        if ($retVal){
            toast('New Plan Created Successfully!','success');
        }else{
            Alert::error('Error', 'Something Went wrong, Check Your form');
        }
         return back();
        //dd($request->all());
    }

    public function delete_plan($planId)
    {
        if ($this->planRepository->deletePlan($planId)){
            return redirect(route('all_plans'))->with('success','Deleted Successfully');
        } else{
            Alert::error('Error','Ooops!!!, Something went wrong');
            return back();
        }
    }
    public function subscribers()
    {
        //dd($this->subscription->getAllSubscribedUsers());
        return view('subscribers',[
            'subscribers'=>$this->subscription->getAllSubscribedUsers()
        ]);
    }
    public function subscriber($subscriberId)
    {
        return view('subscriber', [
            'subscriber'=>$this->subscription->getSubscribedUser($subscriberId)
        ]);
    }
    public function unapprovedDeposits()
    {
        //dd($this->deposit->getUnconfirmedDeposits());
        return view('unapproved_deposits',[
            'deposits'=>$this->deposit->getUnconfirmedDeposits()
        ]);
    }
    public function approvedDeposits()
    {
        //dd($this->subscription->getAllSubscribedUsers());
        return view('unapproved_deposits',[
            'subscribers'=>$this->subscription->getAllSubscribedUsers()
        ]);
    }
    public function activateSubscription($id)
    {
        if ($this->subscription->activateSubscription($id)){
            Alert::success('Success','Operation Successful');
            return back();
        }
        Alert::error('Error','Ooops!!!, Something went wrong');
         return back();
    }
    public function cancelSubscription($subscriptionId)
    {
        if ($this->subscription->cancelSubscription($subscriptionId)){
             Alert::success('Success','You have successfully opted the user out of this plan');
             return back();
        }
        Alert::error('Error','Ooops!!!, Something went wrong');
        return back();
    }
    public function setDailyProfit($subscriberId)
    {
        if (UserWallet::dailyProfit($subscriberId)){
            Alert::success('Success','User Balance Updated Successfully');
            return back();
        }
        Alert::error('Error','Ooops!!!, Seems something went wrong');
        return back();
    }
}
