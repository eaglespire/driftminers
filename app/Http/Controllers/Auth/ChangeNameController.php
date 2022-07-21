<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ProfileUpdated;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class ChangeNameController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function changeName(Request $request)
    {
       $request->validate([
           'name'=> ['required','string','max:255'],
           'username'=> ['required','string','max:255',Rule::unique('users')->ignore(auth()->id())],
       ]);
      // dd($request->all());
        try {
            #Update the user's name
            $user = User::whereId(auth()->id())->first();
            $user->update(['name'=>$request['name'],'username'=>$request['username']]);
            $user->notify(new ProfileUpdated());
            //Alert::success('Success','Name Updated Successfully');
            return back()->with('success','Name Updated Successfully');
        } catch (\Exception $exception){
            Alert::error('Error','Ooops!!!, Seems something went wrong. Please try again later');
            return back();
        }
    }
}
