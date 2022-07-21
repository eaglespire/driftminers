<?php

namespace App\Http\Controllers;

use App\Interfaces\DepositInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\SubscriptionInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use UserServices;
use UserSubscription;
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
        $boxes = collect([
            (object) [
                'id'=>1,
                'title'=>'Users',
                'count'=>UserServices::usersCount() ,
                'url'=>'users.all'
            ],
            (object) [
                'id'=>2,
                'title'=>'Subscribers',
                'count'=>count(UserServices::allSubscribers()) ,
                'url'=>'subscribers'
            ],
            (object) [
                'id'=>3,
                'title'=>'Plans',
                'count'=>count(UserServices::allPlans()) ,
                'url'=>'all_plans'
            ],
        ]);
        return view('admin_home', [
            'boxes'=>$boxes
        ]);
    }
    public function create_plans()
    {
        return view('plans.create_plans');
    }
    public function all_plans()
    {
        return view('plans.all_plans', [
            'plans'=>$this->planRepository->getAllPlans()
        ]);
    }
    public function edit_plan($planId)
    {
        return view('plans.edit_plan',[
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
        return view('subscribers.subscribers',[
            'subscribers'=>$this->subscription->getAllSubscribedUsers()
        ]);
    }
    public function subscriber($subscriberId)
    {
        return view('subscribers.subscriber', [
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
        if (UserSubscription::activateSubscription($id)){
            Alert::success('Success','Operation Successful');
            return back();
        }
        Alert::error('Error','Ooops!!!, Something went wrong');
         return back();
    }
    public function cancelSubscription($subscriptionId)
    {
        if (UserSubscription::cancelSubscription($subscriptionId)){
            Alert::success('Success','You have successfully opted the user out of this plan');
            return back();
        }
        Alert::error('Error','Ooops!!!, Something went wrong');
        return back();
    }
    public function rejectSubscriptionRequest($subscriptionId)
    {
        if (UserSubscription::rejectSubscriptionRequest($subscriptionId)){
            Alert::success('Success','You have rejected this user\'s  subscription');
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

    public function users()
    {
        return view('users.all',[
            'users'=>UserServices::allUsers()
        ]);
    }
    public function createUser()
    {
        return view('users.create');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name'=>['required','string'] ,
            'username'=>['required','string'] ,
            'email'=>['required','string','unique:users','email'],
            'password'=>['required','min:8','confirmed'],
        ]);
        try {
           $newUser = UserServices::createUser($request);
           Alert::success('Success','New User Created Successfully');
           return redirect(route('users.all'));
        } catch (\Exception $exception){
            Alert::error('Error','Ooops, Something went wrong');
            return back();
        }
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name'=>['required'],
            'username'=>['required'],
            'email'=>['required','email', Rule::unique('users')->ignore($user->id)],
            'password'=>['required','confirmed','min:8']
        ]);
        try {
            $ret = UserServices::editUser($request, $id);
            Alert::success('Success','Update Success');
            return redirect(route('users.all'));
        }catch (\Exception $exception){
            Alert::error('Error','Ooops!!!, Something went wrong');
            return back();
        }
    }
    public function editUser($id)
    {
        return view('users.edit',['user'=>User::find($id)]);
    }
    public function deleteUser($id)
    {
        try {
            Alert::success('Success','User removed successfully');
          $ret_val =  UserServices::removeUser($id);
          return back();
        }  catch(ModelNotFoundException $exception){
            Alert::error('Error','User not found');
            return back();
        }
    }
}
