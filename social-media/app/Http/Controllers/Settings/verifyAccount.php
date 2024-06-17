<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class verifyAccount extends Controller
{
    public function verifyAccount(Request $request)
    {
        $messages = [
            "wrongPassword" => "Incorrect Password!"
        ];

        $username = Auth::username();

        $data = [
            'username' => $request -> $username,
            'password' => $request -> input('password')
        ];
        if(Auth::attempt($data))
        {   
            Session::put('verify', True);
            return back()->with('verify');
        }
        else
        {   
            Session::put('verify', False);
            return back()->withInput()->withErrors([$messages])->with('verify');
        }

    }
}
