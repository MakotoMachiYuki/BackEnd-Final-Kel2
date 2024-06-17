<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class loginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }
        else {
            return view('login');
        }
    }

    public function loginAccount(Request $request)
    {   
        $messages = [
            "wrongLogin" => "Incorrect Email or Password!"
        ];

        $data = [
            'username' => $request -> input('username'),
            'password'=> $request -> input('password'),
        ];
        if(Auth::attempt($data)) {
            Session::put('login',True);
            return redirect('/home');;
        }
        else {
            Session::put('login', False);
            Session::flash('error','Emails or Password Wrong!');
            return back()->withInput($request->input())->withErrors([$messages]);

        }
    }

    public function logout()
    {   
        Auth::logout();
        Session::flush();
        return redirect('/home');   
    }
}
