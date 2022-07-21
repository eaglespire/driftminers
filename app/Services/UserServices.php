<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
       return Subscription::get();
   }
    public function allPlans()
    {
        return Plan::get();
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
}

