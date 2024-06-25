<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;


class profileController extends Controller
{
public function profile()
{
    $userId = Auth::id();
    $user = User::find($userId); 
    $userYourPost = Post::where('user_id', $userId)->get();
    $followersCount = $user->followersCount(); 
    $followingsCount = $user->followingsCount(); 
    
    return view('profile')->with([
        'user' => $user,
        'userYourPost' => $userYourPost,
        'followersCount' => $followersCount,
        'followingsCount' => $followingsCount
    ]);
}


    public function currProfile()
    {
        $user = Auth::user();
        return view('profile')->with('user', $user);
    }

    public function accProfile($id)
    {
        $user = User::findOrFail($id);
        $userYourPost = Post::where('user_id', $user->id)->get();
        $followersCount = $user->followersCount();
        $followingsCount = $user->followingsCount();
        
        return view('profile', [
            'userYourPost' => $userYourPost,
            'user' => $user,
            'followersCount' => $followersCount,
            'followingsCount' => $followingsCount
        ]);
}
}