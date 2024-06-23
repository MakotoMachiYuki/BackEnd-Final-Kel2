<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class profileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $posts = $user->creator ? $user->creator->posts : collect();
        return view('profile', ['user' => $user, 'posts' => $posts]);
    }

    public function currProfile()
    {
        $user = Auth::user();
        return view('profile')->with('user', $user);
    }

    public function accProfile($id)
    {
        $user = User::findOrFail($id);
        return view('profile')->with('user', $user);
    }
}
