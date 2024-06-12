<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function likePost($id)
    {
        $postId = "post_{$id}";

        if (!Session::has($postId)) {
            $post = Post::findOrFail($id);
            $post->increment('likes_count');
            Session::put($postId, true);
        }

        return back();
    }
}
