<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likePost(Post $post)
    {
        if (!$post || !$post->id) {
            return response()->json(['success' => false, 'error' => 'Invalid post ID'], 400);
        }

        $like = Like::firstOrCreate([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
        ]);

        $post->loadCount('likes');
        return response()->json(['success' => true, 'like' => $like, 'likes_count' => $post->likes_count]);
    }

    public function unlikePost(Post $post)
    {
        $post->likes()->where('user_id', Auth::id())->delete();
        $post->loadCount('likes');
        return response()->json(['success' => true, 'likes_count' => $post->likes_count]);
    }}


