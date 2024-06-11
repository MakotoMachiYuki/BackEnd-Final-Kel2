<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
        $post = Post::create([
            'creator_id' => Auth::id(),
            'title' => $request->title,
            'text'=> $request->text,
            ]);

            return redirect('home');
    }
}
