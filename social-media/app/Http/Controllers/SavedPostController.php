<?php
namespace App\Http\Controllers;

use App\Models\Saved_post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class savedPostController extends Controller
{
    public function addSavedPost(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer|exists:posts,id',
        ]);

        $savedPost = Saved_post::create([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'saved_date' => now(),
        ]);

        return redirect()->back()->with('sucess', 'Save post');   
    }

    public function removeSavedPost(Request $request)
    {
        $request->validate([
            'post_id' => 'required|integer|exists:saved_posts,id'
        ]);

        $post_id = $request->post_id;
        $removePost = Saved_post::findOrFail($post_id);

        if($removePost->user_id !== Auth::id()){
            return response()->view('error.custom', [], 500);
        }
        else{
            $removePost->delete();
            return redirect()->back()->with('success', 'Unsave post');
        }
    }
}