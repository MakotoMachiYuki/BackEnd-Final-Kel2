<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class resetPasswordController extends Controller
{

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::where('username', $request->username)->first();

        if(!$user){
            return back()->withErrors(['username' => 'No user could be found for this  username.']);
        }

       $user->password = Hash::make($request->password);
       $user->save();

        return redirect('/login')->with('status', 'Password has been reset!');
    }
}
