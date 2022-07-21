<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\PasswordChanged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * @throws ValidationException
     */
    public function changePassword(Request $request)
    {
       //validate
        $request->validate([
            'current_password'=>['required'],
            'new_password'=>['required','min:8','confirmed']
        ]);
        if (!Hash::check($request['current_password'], auth()->user()->password)){
            throw ValidationException::withMessages(['password_not_matched'=>'The current password you entered does not exist in our records']);
        }
        try {
            #Update the new password
            $user = User::whereId(auth()->id())->first();
            $user->update(['password'=>Hash::make($request['new_password'])]);
            $user->notify(new PasswordChanged());
            Alert::success('Success','Password Changed Successfully');
            return back();
        } catch (\Exception $exception){
            Alert::error('Error','Ooops!!!, Something went wrong. Please try again later');
            return back();
        }
    }
}
