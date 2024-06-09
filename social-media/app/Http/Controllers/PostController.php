<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function create()
    {
        return view('post');
    }
    public function createPost(Request $request)
    {
        $user = Post::create([
            'title' => $request->title,
            'text'=> $request->text,
          
            ]);

            return redirect('home');
    }
}
