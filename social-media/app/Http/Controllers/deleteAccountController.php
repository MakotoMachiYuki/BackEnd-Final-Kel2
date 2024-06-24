<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\saved_post;
use App\Models\Creator;
use App\Models\Creator_posts;

class deleteAccountController extends Controller
{
    public function index()
    {   
        return view ('settings');
    }

    public function deleteAccountIndex()
    {   
        if(!session('verified'))
        {
            return view('verifyAccount');
        }
            return view ('deleteAccount');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        Creator_posts::where('creator_id', $user->id)->delete();
        Creator::where('user_id', $user->id)->delete();
        saved_post::where('user_id', $user->id)->delete();
        Auth::logout();
        $user->delete();
        return redirect('/login')->with('status', 'Your account has been deleted.');
    }
}

