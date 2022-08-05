<?php

namespace App\Http\Controllers\Admin;

use App\Facades\PlanFacade;
use App\Facades\SubscriptionFacade;
use App\Facades\UserFacade;
use App\Facades\WalletFacade;
use App\Facades\WithdrawalFacade;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AdminLogicController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role.admin']);
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
        if (PlanFacade::updatePlan($planId,$planDetails)){
            session()->flash('success','Updated Successfully!');
        }else{
            session()->flash('error','Something went wrong!');
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
        $retVal = PlanFacade::createPlan($newPlanDetails);
        if ($retVal){
            session()->flash('success','New Plan Created Successfully!');
        }else{
            session()->flash('error','Something Went wrong, Check Your form!');
        }
         return back();
    }
    public function delete_plan($planId)
    {
        if (PlanFacade::deletePlan($planId)){
            return redirect(route('all_plans'))->with('success','Deleted Successfully');
        } else{
            session()->flash('error','Something went wrong');
            return back();
        }
    }
    public function activateSubscription($id)
    {
        if (SubscriptionFacade::activateSubscription($id)){
            session()->flash('success','Operation successful!');
        } else{
            session()->flash('error','Something went wrong!');
        }
         return back();
    }
    public function cancelSubscription($subscriptionId)
    {
        if (SubscriptionFacade::cancelSubscription($subscriptionId)){
            session()->flash('success','You have successfully opted the user out of this plan');
        } else{
            session()->flash('error','Something went wrong!');
        }
        return back();
    }
    public function rejectSubscriptionRequest($subscriptionId)
    {
        //validate the message
        request()->validate([
           'message'=>['required','string']
        ]);
        $message = request('message');
        if (SubscriptionFacade::rejectSubscriptionRequest($subscriptionId,$message)){
            session()->flash('success','You have rejected this user\'s subscription');
        }else{
            session()->flash('error','An error has occurred!');
        }
        return back();
    }
    public function miningFunction($subscriberId)
    {
        $lastMiningDate = request()['last_mining_date'];
        $miningDateValue = request()['mining_date_value'];
       // dd($lastMiningDate);
        if (WalletFacade::miningWorker($subscriberId,$lastMiningDate,$miningDateValue)){
            session()->flash('success','User Balance Updated Successfully');
        } else{
            session()->flash('error','Something went wrong!');
        }
        return back();
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
            UserFacade::createUser($request);
            session()->flash('success','New User Created Successfully');
           return redirect(route('users.all'));
        } catch (\Exception $exception){
            session()->flash('error','An error has occurred!');
            return back();
        }
    }
    public function updateUser(Request $request, $id)
    {
        $user = UserFacade::getUser($id);
        $request->validate([
            'name'=>['required'],
            'username'=>['required'],
            'email'=>['required','email', Rule::unique('users')->ignore($user->id)],
            'password'=>['required','confirmed','min:8']
        ]);
        try {
            $ret = UserFacade::editUser($request, $id);
           session()->flash('success','Update success');
            return redirect(route('users.all'));
        }catch (\Exception $exception){
            return back()->with('error','An error has occurred!');
        }
    }

    public function deleteUser($id)
    {
        try {
            session()->flash('success','User removed successfully');
          $ret_val =  UserFacade::removeUser($id);
          return back();
        }  catch(ModelNotFoundException $exception){
            session()->flash('error','User not found');
            return back();
        }
    }



    public function rejectWithdrawal(Request $request)
    {
        $request->validate([
            'message'=>['required','string']
        ]);

        $message = $request['message'];
        $userId = $request['userId'];

        if (WithdrawalFacade::rejectWithdrawal($userId, $message)){
            return back()->with('success','Request Declined and Message sent to Client');
        }
        return back()->with('error','Ooops!!!, Something Went Wrong');
    }
    public function acceptWithdrawal(Request $request)
    {
        $request->validate([
            'message'=>['required','string']
        ]);

        $message = $request['message'];
        $userId = $request['userId'];
        $withdrawal_id = $request['withdrawal_id'];
        if (WithdrawalFacade::acceptWithdrawal($userId,$message,$withdrawal_id)){
            return back()->with('success','Withdrawal Request Accepted and Message sent to Client');
        }
        return back()->with('error','Ooops!!!, Something Went Wrong');
    }
    public function payNow(Request $request)
    {
        $request->validate([
            'message'=>['required','string']
        ]);

        $message = $request['message'];
        $userId = $request['userId'];
        if (WithdrawalFacade::payClient($userId,$message)){
            return back()->with('success','Success');
        }
        return back()->with('error','Ooops!!!, Something Went Wrong');
    }

    public function updateUserWallet(Request $request)
    {
        $userId = $request['userId'];
        $amount = $request['amount'];
        $value = $request['value'];
       if (WalletFacade::updateUserWalletFromAdmin($userId,$amount,$value)){
           return back()->with('success','User balance updated successfully');
       }
       return back()->with('error','Ooops!!!, an error has occurred');
    }

}
