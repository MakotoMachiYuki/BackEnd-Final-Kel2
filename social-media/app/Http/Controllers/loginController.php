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
            return redirect('/');
        }
        else {
            return view('login');
        }
    }

    public function loginAccount(Request $request)
    {
        $data = [
            'username' => $request -> input('username'),
            'password'=> $request -> input('password'),
        ];
        if(Auth::attempt($data)) {
            return redirect('/home');
        }
        else {
            Session::flash('error','Email or Password Wrong!');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');    
    }
}
