<?php

namespace App\traits;

use App\Facades\WalletFacade;
use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\ClientWithdrawalDBRequest;
use App\Notifications\ClientWithdrawalDBResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;

trait SendWithdrawalRequest
{
    /**
     * @throws ValidationException
     */
    public function getWithdrawalRequest(Request $request) : bool
    {
        $amount = $request['amount'];
        $walletAddress = $request['wallet_address'];
        $cryptocurrencyType = $request['cryptocurrency_type'];

        //check to see if the withdrawal amount is greater than the wallet balance
        //get the current balance
        $balance = WalletFacade::currentBalance(auth()->id());
        if ($amount > $balance ){
            throw ValidationException::withMessages(['invalid_amount'=>'Oops!!!, Insufficient funds']);
        }
        try {
            //get the user
            $user = User::where('id',auth()->id())->firstOrFail();
            // dd($user);
        }  catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['user_not_found'=>'Ooops!!, User Not Found']);
        }
        try {
            //register this withdrawal request in the database
            Withdrawal::create(['user_id'=>auth()->id(),'amount'=>$amount,'wallet_address'=>$walletAddress,'cryptocurrency_type'=>ucfirst($cryptocurrencyType)]);
            //register this withdrawal in the transaction histories table
            TransactionHistory::create(['user_id'=>auth()->id(),'amount'=>$amount,'type'=>'withdrawal','status'=>'pending']);
        } catch (\Exception $exception){
            //dd($exception->getMessage());
            Log::error($exception->getMessage());
            //Log::info($exception->getMessage());
            throw ValidationException::withMessages(['record_not_created'=>'Ooops!!!, Connection was disrupted']);
        }
        try {
            $admins = User::where('is_admin',1)->get();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['record_not_found'=>'Ooops!!!, No records found in the database']);
        }
        //Send the withdrawal request to the admin and return a response pending message to the client
        Notification::send($admins, new ClientWithdrawalDBRequest($amount,$user->email,$user->name,$balance));
        // Notification::send($admins, new ClientWithdrawalMailRequest($amount,$user->email,$user->name,$balance));
        // return a success but pending message to the client
        $user->notify(new ClientWithdrawalDBResponse());
        //$user->notify(new ClientWithdrawalMailResponse());
        return true;
    }
}
