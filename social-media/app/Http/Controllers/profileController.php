<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;


class profileController extends Controller
{
    public function profile()
    {
        $user = Auth::id();
        $userYourPost = Post::where('user_id', $user)->get();
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
        $user_id = $user->id;
        $userYourPost = Post::where('user_id', $user_id)->get();
        return view('profile')->with('userYourPost', $userYourPost)->with('user', $user);
    }
}
