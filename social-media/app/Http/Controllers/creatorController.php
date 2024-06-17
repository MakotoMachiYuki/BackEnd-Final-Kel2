<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use App\Models\Post;
use Illuminate\Http\Request;

class creatorController extends Controller
{
    public function createCreator(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'post_id' => 'required|integer',
        ]);

        $createCreator = Creator::create([
            'user_id' => $request->user_id,
            'created_date' => now(),
        ]);

        $post = Post::findOrFail($request->post_id);
        $post->creator()->attach($createCreator->id);

        return redirect('home');
    }
}
