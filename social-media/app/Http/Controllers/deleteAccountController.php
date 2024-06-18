<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class deleteAccountController extends Controller
{
    public function index()
    {
        return view ('deleteaccount');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

    }
}
?>