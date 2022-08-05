<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Facades\ProfileFacade;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function updateProfile(Request $request)
    {
       $request->validate([
           'name'=> ['required','string','max:255'],
           'username'=> ['required','string','max:255',Rule::unique('users')->ignore(auth()->id())],
       ]);
        if (ProfileFacade::updateProfile(auth()->id(),$request['name'],$request['username'])){
            return back()->with('success','Profile Update Success');
        }
        return back()->with('error','An error has occurred');
    }
}
