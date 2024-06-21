<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Session;

class ChangeAccountInformationController extends Controller
{
    public function ChangeAccountInformationIndex()
    {   
        if(session('verified'))
        {
            return view('change_account_information');
        }
        else
        {
            return view('verifyAccount');
        }
    }

    //still figuring out how to make session as authentication
    public function changeEmailIndex()
    {  
        return view('changeEmail');  
    }

    public function changeUsernameIndex()
    {
        return view('changeUsername');
    }

    public function changePasswordIndex()
    {
        return view('changePassword');  
    }

    public function changeEmail(Request $request)
    {
        $messages = 
        [
            "email.unique" => "Email has already been taken",
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "email.exists" => "Email doesn't exists",
        ];

        $validator = Validator::make($request -> all(),
        [
            'email' => 'required|string|email|max:255|unique:users'
        ], $messages);

        if($validator->fails())
        {
            return back()->withInput($request->all())->withErrors($validator);
        }

        User::whereId(auth()->user()->id)->update([
            'email' => $request -> email,
        ]);
        return redirect('logout')->with('status', 'Email changed successfully');

    }

    public function changeUsername(Request $request)
    {
        $messages = 
        [
            "username.required" => "Username is required",
            "username.min" => "Username must be at least 4 characthers",
            "username.max" => "Username must be no longer than 25 characthers",
            "username.alpha_dash" => "Username can't contain space",
            "username.regex" => "Username must be in lowercases and no numbers",
        ];

        $validator = Validator::make($request -> all(),
        [   
            'username'=> 'required|string|min:4|max:25|alpha_dash:ascii|unique:users|regex:/^[a-z]+$/',
        ], $messages);

        if($validator->fails())
        {
            return back()->withInput($request->all())->withErrors($validator);
        }

        User::whereId(auth()->user()->id)->update([
            'username' => $request -> username,
        ]);
        return redirect('logout')->with('status', 'Username changed successfully');
    }

    public function changePassword(Request $request)
    {
        $messages = [
            "password.required" => "Password is required",
            "password.mixedCase" => "Password must contain one Uppercase (A) and one lowercase (a)",
            "password.numbers" => "Password must contain one number",
            "password.symbols" => "Password must contain one symbol",            
            "password.min" => "Password must be at least 8 characthers",

            "password_confirm.required" => "Password Confirm is required!",
            "password_confirm.same" => "Confirm Password didn't match!"
        ];

        $validator = Validator::make($request -> all(),[

                'password'=> ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
                'password_confirm' => 'required|same:password',
        ],  $messages);    

        if($validator->fails())
        {
            return back()->withInput($request->all())->withErrors($validator);
        }

        if(Hash::check($request->password, auth()->user()->password))
        {   
            $samePassword = "The new password is the same as old password!";
            return back()->withInput($request->all())->withErrors($samePassword);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request -> password)
        ]);
        return redirect('logout')->with('status', 'Password changed successfully');

    }
}
