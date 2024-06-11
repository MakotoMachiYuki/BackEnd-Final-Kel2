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
          
    

            return redirect('home');
    }
}
