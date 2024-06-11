<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illluminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function reset(Requset $request)
    {
        $validator = Validator::make($request->all(),[
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|'
        ]);
        
        if(validator->fails()) {
            return response()->json(['errors' => $validator->errors()],422);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token') ,
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::reset_password
            ? response()->json(['message' => __($status)], 200)
            : response()->json(['message' => __($status)], 400);

    }
}
?>