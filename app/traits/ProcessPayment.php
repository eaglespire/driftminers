<?php

namespace App\traits;

use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Withdrawal;
use App\Notifications\ClientDBWithdrawalAccepted;
use App\Notifications\ClientDBWithdrawalRejected;
use App\Notifications\PaymentDBCompleted;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

trait ProcessPayment
{
    /**
     * @throws ValidationException
     */
    public function payNow($userId, $message) :bool
    {
        try {
            //fetch and notify the client that payment is about to be carried out
            $user = User::where('id',$userId)->firstOrFail();
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            //return false;
            throw ValidationException::withMessages(['userNotFound'=>'User Not Found']);
        }
        try {
            //fetch the withdrawal instance from the db
            $withdrawalInstance = Withdrawal::where('user_id',$userId)->firstOrFail();
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['recordNotFound'=>'Withdrawal instance not found']);
        }
        try {
            //get the wallet instance
            $walletInstance = Wallet::where('user_id',$userId)->firstOrFail();
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['walletNotFound'=>'This User has no associated wallet']);
        }
        //get the current balance
        $currentBalance = $walletInstance?->balance;
        //get the amount to withdraw
        $amountToPay = $withdrawalInstance?->amount;
        $newBalance = $currentBalance - $amountToPay;
        $walletInstance->update(['balance'=>$newBalance]);
        TransactionHistory::create(['user_id'=>$userId,'amount'=>$amountToPay,'type'=>'withdrawal','status'=>'completed']);
        //remove the withdrawal instance from the database and register it in the transactions history table
        $withdrawalInstance->delete();
        //notify the user
        $user->notify(new PaymentDBCompleted($message));
        // $user->notify(new PaymentMailCompleted($message));
        return true;
    }

    /**
     * @throws ValidationException
     */
    public function rejectPaymentRequest($userId, String $message) : bool
    {
        try {
            //get the user
            $user = User::findOrFail($userId);
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['notFound'=>'UserFacade not found']);
        }

        try {
            //get the user withdrawal request instance and remove it from the database
            // removing it from the database frees up the user to make another
            //withdraw request
            //and register it in the transactions history table
            $withdrawal = Withdrawal::where('user_id',$userId)->firstOrFail();
            $amount = $withdrawal->amount;
        } catch (ModelNotFoundException $exception) {
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['notFound'=>'WithdrawalFacade instance not found']);
        }
        try {
            TransactionHistory::create(['user_id'=>$user->id,'amount'=>$amount,'type'=>'withdrawal','status'=>'rejected']);
            $withdrawal->delete();
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            return false;
        }
        $user->notify(new ClientDBWithdrawalRejected($message));
        //$user->notify(new ClientMailWithdrawalRejected($message));
        return true;
    }

    /**
     * @throws ValidationException
     */
    public function acceptPaymentRequest($userId, $message, $withdrawalId) : bool
    {
        try {
            //get the user to notify
            $user = User::findOrFail($userId);
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['userNotFound'=>'UserFacade Not Found']);
        }
        try {
            //get the withdrawal
            $withdrawal = Withdrawal::findOrFail($withdrawalId);
            $withdrawal->update(['is_approved'=>true]);
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['withdrawalNotFound'=>'WithdrawalFacade Instance Not Found']);
        }
        $user->notify(new ClientDBWithdrawalAccepted($message));
        return true;
    }
}
