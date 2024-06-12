<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function showResetPasswordForm()
    {
        return view('reset-password');
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required|confirmed',
            'token' => 'required',
        ]);

        if($validator_>fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $passwordReset = DB::table('password_resets')
        ->where('token', $request->token)
        ->first();

        if (!$passwordReset){
            return back()->withErrors(['token'=> 'This password reset token is invalid.']);
        }

        $user = User::where('username', $passwordReset->username)->first();
        
        if(!$user){
            return back()->withError(['username' => 'No user could be found for this username address.']);
        }

       $user = User::where('username', $passwordReset->username)->first();

       if(!$user) {
        return back()-> withErrors(['username'=> "No user could be found for this username address"]);
       }

       $user->password = Hash::make($request->password);
       $user->save();

        DB::table('password_resets')->where('username', $passwordReset->username).delete();

        return redirect('/login')->with('status', 'Password has been reset!');
}
}
?>