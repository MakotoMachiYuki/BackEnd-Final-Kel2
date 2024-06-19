<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;


class FollowerController extends Controller


{
    public function follower(User $user)
    $followerid = Auth::id();
    $followingid =  $user->id;

}
