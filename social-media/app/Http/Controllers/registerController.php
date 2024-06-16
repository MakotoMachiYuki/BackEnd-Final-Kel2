<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
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
        $messages = [
            "username.required" => "Username is required",
            "username.min" => "Username must be at least 4 characthers",
            "username.max" => "Username must be no longer than 25 characthers",
            "username.alpha_dash" => "Username can't contain space",
            "username.regex" => "Username must be in lowercases and no numbers",
            
            "username.unique" => "This Username has already been taken",

            "firstName.required" => "You must have a first name",
            "firstName.min" => "Your first name must be at least 3 characthers",
            "firstName.max" => "Your first name must be no longer than 25 characther",

            "email.unique" => "Email has already been taken",
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "email.exists" => "Email doesn't exists",
            
            "password.required" => "Password is required",
            "password.mixedCase" => "Password must contain one Uppercase (A) and one lowercase (a)",
            "password.numbers" => "Password must contain one number",
            "password.symbols" => "Password must contain one symbol",            
            "password.min" => "Password must be at least 8 characthers",

            "dateOfBirth.required" => "Date of Birth is required",
            "dateOfBirth.before" => "You must be at least 13 years old!",
            "dateOfBirth.after" => "The longest human has lived recorded is 122 years old.",

            "password_confirm.required" => "Password Confirm is required!",
            "password_confirm.same" => "Confirm Password didn't match!"
        ];

        $validator = Validator::make($request -> all(), [
            'username'=> 'required|string|min:4|max:25|alpha_dash:ascii|unique:users|regex:/^[a-z]+$/',
            'firstName'=>'required|string|min:3|max:25',
            'lastName'=>'nullable|string|max:25',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=> ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'password_confirm' => 'required|same:password',
            'dateOfBirth' => ['required', 'before:13 years ago', 'after:122 years ago'],
        ], $messages);

        if($validator->fails())
        {
            return back()->withInput($request->all())->withErrors($validator);
        }
        $user = User::create([
            'username' => $request->username,
            'firstName'=> $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'dateOfBirth' => $request -> dateOfBirth,
            'password' => Hash::make($request->password),
            ]);

            Session::flash('message','Registration Succeed! Now pls login back!');
            return redirect('login');
    }
}
