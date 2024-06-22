<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\saved_post;
use App\Models\Creator;

class deleteAccountController extends Controller
{
    public function index()
    {
        return view ('settings');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        Creator::where('user_id', $user->id)->delete();
        saved_post::where('user_id', $user->id)->delete();
        Auth::logout();
        $user->delete();
        return redirect('/login')->with('status', 'Your account has been deleted.');
}
}
?>
