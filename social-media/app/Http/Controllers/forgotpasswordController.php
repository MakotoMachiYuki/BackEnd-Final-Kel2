<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    public function sendReset(Request $request)
    {
        $request->validate(['username'=> 'required']);
        $user = User::where('username', $request->username)->first();

        if(!$user) {
            return back()->withErrors(['username' => 'Username not found.']);
        }

    $token = str::random(60);    
    DB::table('password_resets')->insert([
        'username'=> $user->username,
        'token' => $token,
        'created_at'=> now(),
    ]);
    
    $resetLink = route('password.reset', ['token' => $token]);
    return back()->with('status', 'Password reset link has been generated. Here it is: '. $resetLink);
    }
}
?>