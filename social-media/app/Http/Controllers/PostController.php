<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Creator;
use Illuminate\Http\Request;

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
        $creator = $user->creator()->first();
        
        if (!$creator) {
            $creator = Creator::create([
                'user_id' => $user_id
            ]);
        }
        
        $post = Post::create([
            'title' => $request->title,
            'text'=> $request->text,
        ]);

        $creator->post()->attach($post->id);
        return redirect('home');
    }
}
