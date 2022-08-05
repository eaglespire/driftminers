<?php

namespace App\Services;

use App\Models\MiningDate;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class WalletServices
{
   public function currentBalance($userId)
   {
       $user = User::with('wallet')->whereId($userId)->first();
       return $user?->wallet?->balance;
   }

    /**
     * @throws ValidationException
     */
    public function getLastMiningDate($userId)
   {
       try {
           //fetch the user wallet instance
           $userWallet = Wallet::where('user_id', $userId)->firstOrFail();
           //fetch the last mining date and return it
           return $userWallet->last_mining_date;
       } catch (ModelNotFoundException $exception){
           Log::error('User Not Found');
           throw ValidationException::withMessages(['NotFound'=>'User Not Found']);
       }
   }

    /**
     * @throws ValidationException
     */
    public function updateUserWalletFromAdmin($userId, $amount): bool
    {
       try {
           //get the user wallet
           $userWallet = Wallet::where('user_id',$userId)->firstOrFail();
           $userWallet->update(['balance'=>$amount]);
           return true;
       } catch (ModelNotFoundException $exception){
           Log::error($exception->getMessage());
           return false;
       }

   }

    /**
     * @throws ValidationException
     */

    public function miningWorker($subscriberId, $lastMiningDate,$miningDateValue)
    {
        try {
            $subscriber = Subscriber::with('user','plan')->whereId($subscriberId)->firstOrFail();
            //get the user
            $user = User::whereId($subscriber->user_id)->first();
            //fetch the roi
            $roi = $subscriber->plan->roi;
            //fetch the duration
            $duration = $subscriber->plan->duration;
            //fetch the minimum investment
            $investment = $subscriber->plan->minimum_investment;
            $profit = $this->calculateIncrement($investment,$roi,$duration);
            //update the user wallet
            if ($this->userWalletWorker($user->id,$profit,$lastMiningDate,$miningDateValue)){
                return true;
            }
            return false;
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['notFound'=>'Instance Data cannot be found']);
        }
    }

    /**
     * @throws ValidationException
     */
    public function dailyProfit($subscriberId, $lastMiningDate, $value): bool
   {
       $subscriber = Subscriber::with('user','plan')->whereId($subscriberId)->first();
       //get the user
       $user = User::whereId($subscriber->user_id)->first();
       //fetch the roi
       $roi = $subscriber->plan->roi;
       //fetch the duration
       $duration = $subscriber->plan->duration;
       //fetch the minimum investment
       $investment = $subscriber->plan->minimum_investment;
       $profit = $this->calculateIncrement($investment,$roi,$duration);
//       if ($this->addProfitToWallet($user->id,$profit, $lastMiningDate)){
//           return true;
//       }
       if ($this->userWalletWorker($user->id,$profit,$lastMiningDate,$value)){
           return true;
       }
       return false;
   }
   private function addProfitToWallet($userId,$profit, $date): bool|int
   {
       //get the user wallet
       $userWallet = Wallet::with('user')->where('user_id',$userId)->first();
       //get the current balance
       $currentBalance = $userWallet->balance;
      return $userWallet->update([
          'balance' => $currentBalance + $profit ,
          'last_mining_date'=> $date,
      ]);
   }
   private function calculateIncrement($investment,$roi,$duration): float|int
   {
        $profit = ($investment * $roi * $duration) / 100;
        return $profit / $duration;
   }

    /**
     * @throws ValidationException
     */
    public function lastMiningDate($userId)
   {
       try {
           //get the wallet associated with this user
           $userWallet = Wallet::where('user_id',$userId)->firstOrFail();
           return $userWallet->last_mining_date?->toFormattedDateString() ?? null;
       } catch (ModelNotFoundException $exception){
           Log::error($exception->getMessage());
           throw ValidationException::withMessages(['WalletNotFound'=>'This User has no wallet yet']);
       }

   }
    public function getUserWallet($userId)
    {
        return Wallet::whereId($userId)->first();
    }
    public function buildWallet($userId,$amount)
    {
        return Wallet::create([
            'user_id'=>$userId,
            'balance'=>$amount
        ]);
    }

    /**
     * @throws ValidationException
     */
    private function userWalletWorker($userId,$amount,$date,$miningDateValue) : bool
    {
        //get the user wallet you want to update
        try {
            $userWallet = Wallet::where('user_id', $userId)->firstOrFail();
            //get the current balance
            $currentBalance = $userWallet->balance;
            $userWallet->update([
                'balance'=> $currentBalance + $amount,
                'last_mining_date'=>$date
            ]);
            // Create a mining Date table
            $miningDate = MiningDate::create([
                'wallet_id'=>$userWallet->id,
                'mining_date_value'=>$miningDateValue,
                'user_id'=>$userId
            ]);
            if (!$miningDate) {
                throw ValidationException::withMessages(['notCreated'=>'Ooops!!!, Seems Something has gone wrong']);
            }
            return true;

        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['UserNotFound'=>'User Not Found']);
        }
    }

    /**
     * @throws ValidationException
     */
    /*
     * This function is basically used to disable the daily mining button at the admin end
     * It is called in the helpers.php file
     */
    public function getMiningDateValues($userId)
    {
        try {
            //check if the wallet id exist
            MiningDate::where('user_id',$userId)->firstOrFail();
            return MiningDate::where('user_id', $userId)->get();
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
             return null;
            //throw ValidationException::withMessages(['NotFound'=>'An error has occurred']);
        }
    }
}

