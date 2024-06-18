<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Creator;

class profileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $post = $Creator -> post;
        return view('profile', ['user' => $user, 'post' => $Creator]);
    }
}
