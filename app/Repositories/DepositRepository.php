<?php

namespace App\Repositories;

use App\Helpers\DepositHelpers;
use App\Interfaces\DepositInterface;
use App\Jobs\DepositConfirmedJob;
use App\Jobs\NewDepositJob;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class DepositRepository implements DepositInterface
{

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeDeposit(Request $request)
    {
        //first check if the user has already indicated to
        //deposit for this chosen plan

        //DepositHelpers::validateDeposit($request);
        $ret_bool = DepositHelpers::createDeposit($request);
         //get the user
        $user = User::where('id', $request->user_id)->first();
        //Notify the admin via email of this new deposit
        //Also notify the user of this deposit via email
        //build data to send
        $dataToSend = [
            'depositorName'=>$user->name,
            'depositorEmail'=>$user->email,
            'amountDeposited'=>$request->amount,
            'planType'=>Plan::where('id',$request->plan_id)->first()['name'],
            'planDuration'=>Plan::where('id',$request->plan_id)->first()['duration'],
            'planRoi'=>Plan::where('id',$request->plan_id)->first()['roi']
        ];
        NewDepositJob::dispatch($user, $dataToSend);
        return $ret_bool;
    }
    public function confirmDeposit($id) : bool
    {
        $deposit = DepositHelpers::verifyDeposit($id);
        $user = User::whereId($deposit->user_id)->first();
        if ($deposit){
            $data = [
                'depositorName'=>$deposit->user->name,
                'amountInvested'=>$deposit->amount,
                'planType'=>$deposit->plan->name,
                'planDuration'=>$deposit->plan->duration,
                'planRoi'=>$deposit->plan->roi,
            ];
            //notify the user and admins that the deposit has been confirmed
            DepositConfirmedJob::dispatch($user, $data);
        }
        return false;
    }

    public function getConfirmedDeposits()
    {
        return DepositHelpers::confirmedDeposits();
    }

    public function getUnconfirmedDeposits()
    {
        return DepositHelpers::unconfirmedDeposits();
    }

    public function getSingleDeposit($id)
    {
        return DepositHelpers::singleDeposit($id);
    }
}
