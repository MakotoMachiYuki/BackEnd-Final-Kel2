<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Session;

class registerController extends Controller
{
    public function register()
    {
        return view('create_account');
    }

    public function registerAccount(Request $request)
    {
        $request->validate([
            'username'=> 'required|string|max:25',
            'firstName'=>'required|string|max:25',
            'lastName'=>'string|max:25',
            'email'=>'required|string|email|max:255|unique:users',
        'password'=> ['required', 'string', 'confirmed', Password::min(8)->letters()->numbers()->mixedCase()->symbols()]
        ]);
        $user = User::create([
            'username' => $request->username,
            'name'=> $request->name,
            'email' => $request->email,
            'dateOfBirth' => $request -> dateOfBirth,
            'password' => Hash::make($request->password),
            ]);

            Session::flash('message','Registration Succeed! Now pls login back!');
            return redirect('login');
    }
}
