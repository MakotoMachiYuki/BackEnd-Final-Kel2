<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Creator_posts;

class profileController extends Controller
{
    public function profile()
    {
        $user = Auth::id();
        $userYourPost = Creator_posts::where('creator_id', $user)->with('post')->get();
        return view('profile')->with('userYourPost', $userYourPost);
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
