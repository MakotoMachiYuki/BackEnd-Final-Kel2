<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer|exists:posts,id',
            'content' => 'required|string|max:255'
        ]);

        $comment = Comments::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
        ]);

        return back()->with('Your Comment Has Been Added');
    }

    public function getComment(Request $request)
    {    
        $post_id = $request->input('post_id');
        $comments = DB::table('comments')->where('post_id', $post_id)->pluck('content')->get();

        session()->put('comments', $comments);
        session()->save();
        
        return redirect()->back()->with('comment', $comments)->save();


    }
}
