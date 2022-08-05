<?php

namespace App\Services;

use App\Models\BtcAddress;
use App\Models\User;
use App\Notifications\PasswordChanged;
use App\Notifications\ProfileUpdated;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ProfileServices
{
    /**
     * @throws ValidationException
     */
    public function updateProfile($userId, $name, $username): bool
    {
       try {
           #Update the user's name
           $user = User::where('id',$userId)->firstOrFail();
           $user->update(['name'=>$name,'username'=>$username]);
           $user->notify(new ProfileUpdated($user));
           return true;
       } catch (ModelNotFoundException $exception){
           Log::error($exception->getMessage());
            return false;
       }
   }
   public function updatePassword($userId,$newPassword) : bool
   {
       try {
           #Update the new password
           $user = User::where('id',$userId)->firstOrFail();
           $user->update(['password'=>Hash::make($newPassword)]);
           $user->notify(new PasswordChanged());
           return true;
       } catch (ModelNotFoundException $exception){
          Log::error($exception->getMessage());
           return false;
       }
   }
   public function storeWalletAddress($userId,$address): bool
   {
       try {
           BtcAddress::create(['user_id'=>$userId,'address'=>$address]);
           return true;
       } catch (\Exception $exception){
           Log::error($exception->getMessage());
           return false;
       }
   }
   public function updateWalletAddress($userId, $address) : bool
   {
       try {
           //find the address to update
           $userBTCAddress = BtcAddress::where('user_id',$userId)->firstOrFail();
           $userBTCAddress->update(['address'=>$address]);
           return true;
       } catch (ModelNotFoundException $exception){
           Log::error($exception->getMessage());
           return false;
       }
   }
   public function fetchWalletAddress($userId) : mixed
   {
       try {
          $walletAddress = BtcAddress::where('user_id',$userId)->firstOrFail();
          return $walletAddress->address;
       }  catch (ModelNotFoundException $exception){
           Log::error($exception->getMessage());
           return null;
       }
   }
   public function fetchAdminBTCAddress(): string
   {
       try {
           $adminUser =  User::where('is_admin',true)->firstOrFail();
           return $adminUser->btcAddress->address ?? '1234567890123456789012345';
       }catch (ModelNotFoundException $exception){
           Log::error($exception->getMessage());
           return '123456789';
       }
   }

}
