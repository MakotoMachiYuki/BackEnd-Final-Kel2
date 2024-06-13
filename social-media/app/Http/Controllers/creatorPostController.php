<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class creatorPostController extends Controller
{
    public function creatorPost(Request $request){
        $creatorPost = Post::create([
            'created_time' => now(),
        ]);

        return redirect('home');
    }
}
