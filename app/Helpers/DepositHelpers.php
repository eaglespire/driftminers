<?php

namespace App\Helpers;

use App\Jobs\DepositConfirmedJob;
use App\Models\Deposit;
use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DepositHelpers
{
    public static function createDeposit(Request $request)
    {
         if (Deposit::create($request->only('user_id','plan_id','amount'))){
             return true;
         }
         return false;
    }
    public static function confirmDeposit($depositId)
    {
        $deposit = Deposit::whereId($depositId)->first();
        if (!$deposit){
            return false;
        }
        $deposit->update(['deposit_is_confirmed'=>true]);
        //check to see if the user has a wallet already created for him


    }
    public static function verifyDeposit($deposit_id)
    {
        //first find the deposit made by the client
        $deposit = Deposit::whereId($deposit_id)->first();
        //find the user/client who made the deposit
        $user = User::whereId($deposit->user_id)->first();
        // retrieve the plan
        $plan = Plan::whereId($deposit->plan_id)->first();
        if ($deposit){
           $rowsAffected = $deposit->update(['deposit_is_confirmed'=>true]);
           if ($rowsAffected){
               //check to see if the user has a wallet created already
               //and increase the balance with this new deposit
               //otherwise, create a wallet for the user
               //and this deposit will be the starting balance
               $userWallet = WalletHelpers::getUserWallet($user->id);
                if ($userWallet){
                    $userWallet->increment('balance', $deposit->amount);
                } else{
                   WalletHelpers::buildWallet($user,$plan,$deposit->amount);
                }
           }
           return $deposit;
        }
        return false;
    }
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function validateDeposit(Request $request)
    {
        //call this method in a controller
        //find the minimum investment amount for a given plan
        $minimumAmount = PlanHelpers::planMinimumInvestment($request->plan_id);
        Validator::make($request->except('_token','_method'), [
            'amount'=>['required','numeric','min:'.$minimumAmount]
        ])->validate();
    }
    public static function confirmedDeposits()
    {
       return Deposit::where('deposit_is_confirmed',true)->get();
    }
    public static function unconfirmedDeposits()
    {
        return Deposit::with('user','plan')->where('deposit_is_confirmed',false)->get();
    }
    public static function userHasDeposited($userId)
    {
        return Deposit::where('user_id',$userId)->first();
    }


   public static function singleDeposit($id)
   {
       return Deposit::getSingleDeposit($id)->first();
   }
   public static function amountDeposited($id)
   {
       return Deposit::getSingleDeposit($id)->first()->amount;
   }
   public static function depositorName($id)
   {
       return Deposit::getSingleDeposit($id)->first()->user->name;
   }
    public static function depositorEmail($id)
    {
        return Deposit::getSingleDeposit($id)->first()->user->email;
    }
    public static function nameOfPlan($id)
    {
        return Deposit::getSingleDeposit($id)->first()->plan->name;
    }
}
