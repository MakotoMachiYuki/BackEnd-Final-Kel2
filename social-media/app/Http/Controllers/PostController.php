<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Creator;
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
        $userId = Auth::id();
        $user = Auth::user();
        $creator = $user->creator()->first();
        
        if (!$creator) {
            $creator = Creator::create([
                'user_id' => $userId
            ]);
        }
        
        $post = Post::create([
            'title' => $request->title,
            'text'=> $request->text,
        ]);
        $post->save();
      }
    public function store(Request $request)
    {
        dd($request->all());
    }

    public function createPost(Request $request)
    {

    $imagePath = $request->file('post-images')->store('post-images');

 
    $post = Post::create([
        'image' => $imagePath,
        'title' => $request->title,
        'text' => $request->text,
    ]);

        $creator->post()->attach($post->id);
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
