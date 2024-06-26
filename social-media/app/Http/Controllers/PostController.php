<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Creator;
use Illuminate\Http\Request;
use Session;

class postController extends Controller
{
    public function create()
    {
        return view('post');
    }
    
    public function createPost(Request $request)
    {
        $user_id = Auth::id();
        $user = Auth::user();
        $imagePath = $request->file('post-images')->store('post-images');
        $creator = $user->creator()->first();
        
        if (!$creator) {
            $creator = Creator::create([
                'user_id' => $user_id
            ]);
        }
        
        $post = Post::create([
            'user_id' => $user_id,
            'image' => $imagePath,
            'title' => $request->title,
            'text'=> $request->text,
        ]);

        $post->save();
        $creator->post()->attach($post->id);
        return redirect('home');
      }
    public function store(Request $request)
    {
        dd($request->all());
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
    public function index()
{
    $posts = Post::with('comments.user')->get();
    return view('home', compact('posts'));
}

}
