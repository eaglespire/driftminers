<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Facades\ProfileFacade;

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
        if (ProfileFacade::updatePassword(auth()->id(),$request['new_password'])){
            return back()->with('success','Password Changed Successfully');
        }
        return back()->withInput()->with('error','Oops!!!, Something went wrong. Try again later');
    }
}
