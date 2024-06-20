<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;



class FollowerController extends Controller


{
    public function follower(User $user){
    $followerid = Auth::id();
    $followingid =  $user->id;

    if($followerid==$followerid){
    response()->json(['error'=>'You cannot follow yourself'], 400);
    }
    $sudahfollow = Follower::where('follower_id',$followerid)
    ->where('following_id',$followingid)->first();
    
    if($sudahfollow){
        $sudahfollow->delete();
        response()->json(['error'=>'You already follow this account'], 200);
    }
    Follower::create([
        'follower_id' => $followerid,
        'following_id' => $followingid,
    ]);
    return response()->json(['message' => 'User followed successfully.'], 201);
    }
}

