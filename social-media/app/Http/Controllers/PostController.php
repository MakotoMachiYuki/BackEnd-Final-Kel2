<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Creator;
use App\Models\Saved_post;
use Illuminate\Http\Request;

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

        $creator->post()->attach($post->id);
        return redirect('home');
    }
}
