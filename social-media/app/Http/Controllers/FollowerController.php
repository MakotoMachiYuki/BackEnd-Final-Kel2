<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;



class FollowerController extends Controller


{
    public function followUser(User $user){
    $followerId = Auth::id();
    $followingId =  $user->id;
   
    if ($followerId == $followingId) {
        return redirect()->back()->with('error', 'You cannot follow yourself');
    }
    
    $sudahfollow = Follower::where('follower_id',$followerId)
    ->where('following_id',$followingId)->first();
    
    if($sudahfollow){
        $sudahfollow->delete();
        return redirect()->back()->with('error', 'You are already following this user');
    }
    Follower::create([
        'follower_id' => $followerId,
        'following_id' => $followingId,
    ]);
    return redirect()->back()->with('success', 'User followed successfully');
    
}

}