<?php

namespace App\Http\Controllers;

use App\Facades\ProfileFacade;
use App\Rules\BtcAddressRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BtcAddressController extends Controller
{
    public function store(Request $request)
    {
        $messages = [
           'address.required'=>'The address field is required',
            'address.min'=>'Ooops!!!, A BTC Address needs a minimum of 26 characters',
            'address.max'=>'Maximum characters allowed in a valid BTC is 35'
        ];
        $rules = [
            'address'=>['required','string','min:26','max:35']
        ];
        $request->validate($rules,$messages);

        if (ProfileFacade::storeWalletAddress(auth()->id(),$request['address'])){
            return back()->with('success','Wallet address created successfully');
        }
        return back()->with('error','Ooops!!, Something went wrong when setting up wallet address');
    }
    public function update(Request $request)
    {
        $request->validate([
            'address'=>['required','string', new BtcAddressRule]
        ]);
        if (ProfileFacade::updateWalletAddress(auth()->id(),$request['address'])){
            return back()->with('success','Wallet address updated');
        }
        return back()->with('error','Ooops!!, Something went wrong when updating wallet address');

    }
}
