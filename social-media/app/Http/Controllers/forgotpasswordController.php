<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\request;
use Illuminate\Support\Facades\Password;
use Illuminate\Suppport\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator ->errors()], 422);
        }
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::sent_reset_link
        ? response()->json(['message' => __($status)], 200)
        : response()->json(['message' => __($status)], 400);
    }
}
?>