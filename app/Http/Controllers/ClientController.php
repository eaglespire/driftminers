<?php

namespace App\Http\Controllers;
use App\Facades\TransactionHistoryFacade;
use App\Rules\AmountRule;
use Illuminate\Http\Request;
use App\Facades\SubscriptionFacade;
use App\Facades\UserFacade;
use App\Facades\WithdrawalFacade;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified','role.user']);
    }
    public function welcome()
    {
        return view('client.home');
    }
    public function profile()
    {
        return view('client.profile');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */

    public function subscribeToPlan(Request $request)
    {
        if (SubscriptionFacade::subscribe($request)){
            session()->flash('success','Success but Subscription is Pending');
            return back();
        }
        session()->flash('error','Ooops!!!, Something went wrong!');
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
        return view('client.withdrawal', [
            'status'=>WithdrawalFacade::status(auth()->id())
        ]);
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
        return view('client.transactions', [
            'transactions'=>TransactionHistoryFacade::histories(auth()->id())
        ]);
    }
    public function subscribe()
    {
        return view('client.subscribe', [
            'status'=>SubscriptionFacade::checkUserHasSubscribed(auth()->id())
        ]);
    }
    public function storeClientWalletAddress(Request $request)
    {
       $request->validate([
           'wallet_address'=>['required','string','min:26','max:35']
       ]);
       if(UserFacade::setUpWalletAddress(auth()->id(), $request['wallet_address'])){
           return back()->with('success','Address setup completed');
       }
       return back()->with('error','Ooops!!!, Something went wrong. Try again later');
    }
    public function updateClientWalletAddress(Request $request)
    {
        $request->validate([
            'wallet_address'=>['required','string','min:26','max:35']
        ]);
        if (UserFacade::updateWalletAddress(auth()->id(), $request['wallet_address'])){
            return back()->with('success','Updated successfully');
        }
        return back()->with('error','An error has occurred');
    }

    public function processWithdrawal(Request $request)
    {

        $request->validate([
            'amount'=>['required','numeric',new AmountRule],
            'wallet_address'=>['required','string','min:24'],
            'cryptocurrency_type'=>['required','string']
        ]);

        if (WithdrawalFacade::withdrawalRequest($request)){
            return back()->with('success','Request submitted successfully');
        } else{
            return back()->with('error','Ooops!!, Something went wrong');
        }
    }

}
