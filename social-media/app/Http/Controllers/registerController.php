<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
