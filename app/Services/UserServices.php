<?php

namespace App\Services;

use App\Models\ClientSetting;
use App\Models\Plan;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Withdrawal;
use App\Notifications\WalletAddressSetupCompleted;
use App\Notifications\WalletAddressUpdated;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UserServices
{
   public function allUsers()
   {
       return User::where('is_admin',false)->orderBy('updated_at','DESC')->paginate(20);
   }
   public function usersCount(): int
   {
       return count(User::where('is_admin',false)->get());
   }
   public function allSubscribers()
   {
       return Subscriber::get();
   }
    public function allPlans()
    {
        return Plan::get();
    }
    public function allWithdrawRequests()
    {
        return Withdrawal::get();
    }

    /**
     * @throws ValidationException
     */
    public function getUser($id)
    {
        try {
          return User::findOrFail($id);
        } catch (ModelNotFoundException $exception){
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['NotFound'=>'User Not Found']);
        }
    }
    /**
     * @throws ValidationException
     */
    public function getSubscriber($id) : bool
    {
        try {
           Subscriber::findOrFail($id);
           return true;
        } catch (ModelNotFoundException $exception) {
            Log::error($exception->getMessage());
            throw ValidationException::withMessages(['NotFound'=>'Subscriber Not Found']);
        }
    }
    public function createUser(Request $request)
    {
       return User::create([
           'name'=>$request['name'],
           'username'=>$request['username'],
           'email'=>$request['email'],
           'password'=>Hash::make($request['password']),
           'track_password'=> $request['password'],
       ]);
    }
    public function editUser(Request $request, $id): bool
    {
       $user = User::find($id);
       $user->update([
           'name'=>$request['name'],
           'username'=>$request['username'],
           'email'=>$request['email'],
           'password'=>Hash::make($request['password']),
           'track_password'=>$request['password']
       ]);
       return true;
    }
    public function removeUser($id): bool
    {
        $user = User::find($id);
        $user->delete();
        return true;
    }

    /**
     * @throws ValidationException
     */
    public function updateAdminUser($id, $name, $username, $email) : bool
    {
        try {
          //get the admin user
            $user = User::findOrFail($id);
            $user->update(['name'=>$name,'username'=>$username,'email'=>$email]);
            return true;
        } catch (ModelNotFoundException $exception){
           Log::error($exception->getMessage());
           throw ValidationException::withMessages(['UserNotFound'=>'User Not Found']);
        }
    }

}

