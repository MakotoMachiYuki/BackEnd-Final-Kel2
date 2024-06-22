<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class forgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    public function verifyUsername(Request $request)
    {
        $request->validate(['username'=> 'required']);
        $user = User::where('username', $request->username)->first();

        if(!$user) {
            return back()->withErrors(['username' => 'Username not found.']);
        }

    return view('reset-password', ['username' => $user->username]);
    }
}