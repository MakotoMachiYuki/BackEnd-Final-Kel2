<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\User;
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
        $commentsInfo = Comments::where('post_id', $post_id)->get();

        $contents = $commentsInfo->content;
        $user_id = $commentsInfo->user_id;

        $usernames = User::where('id', $user_id)->get();

        $content = [];
        foreach ($contents as $tempContent) {
            $content[] = $tempContent;
        }

        $username = [];
        foreach($usernames as $tempusername)
        {
            $username[] = $tempusername;
        }

        $comments = [];
        $i = 0;
        foreach($content as $tempContent)
        {
            $username[$i] . ": " . implode(',', array_slice($tempContent, 1));
            $i++;
        }

        return view('home')->with('comments', $comments);


    }
}
