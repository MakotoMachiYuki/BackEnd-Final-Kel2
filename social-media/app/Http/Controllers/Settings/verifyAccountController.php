<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class verifyAccountController extends Controller
{   

    public function verifyAccountIndex()
    {   
        return view('verifyAccount');
    }

    public function verifyAccount(Request $request)
    {
        $messages = [
            "wrongPassword" => "Incorrect Password!"
        ];

        $username = Auth::user() -> username;

        $data = [
            'username' => $username,
            'password' => $request -> input('password')
        ];
        if(Auth::attempt($data))
        {   
            return redirect('settings/change_account_information')->with('verified', 'UserIsVerified');
        }
        else
        {   
            return back()->withInput()->withErrors([$messages]);
        }

    }
}
