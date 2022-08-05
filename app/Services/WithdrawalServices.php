<?php

namespace App\Services;
use App\Models\Withdrawal;
use App\traits\ProcessPayment;
use App\traits\SendWithdrawalRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class WithdrawalServices
{
    use SendWithdrawalRequest, ProcessPayment;
    public function status($userId) : bool
    {
        try {
            Withdrawal::where('user_id',$userId)->firstOrFail();
            return true;
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            return false;
        }
    }
    public function withdrawalApproved($userId) : bool
    {
        try {
            Withdrawal::where('user_id',$userId)->where('is_approved',true)->firstOrFail();
            return true;
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            return false;
        }
    }
    public function allRequests()
    {
        return Withdrawal::paginate(10);
    }
    /**
     * @throws ValidationException
     */
    public function withdrawalRequest(Request $request) : bool
    {
       return $this->getWithdrawalRequest($request);
    }

    /**
     * @throws ValidationException
     */
    public function rejectWithdrawal($userId, String $message) : bool
    {
        return $this->rejectPaymentRequest($userId,$message);
    }

    /**
     * @throws ValidationException
     */
    public function acceptWithdrawal($userId, $message, $withdrawalId) : bool
    {
        return $this->acceptPaymentRequest($userId,$message,$withdrawalId);
    }

    /**
     * @throws ValidationException
     */
    public function payClient($userId, $message) :bool
    {
        return $this->payNow($userId,$message);
    }
}
