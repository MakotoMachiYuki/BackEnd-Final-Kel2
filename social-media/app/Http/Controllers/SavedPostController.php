<?php
namespace App\Http\Controllers;

use App\Models\Saved_post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class savedPostController extends Controller
{
    public function userAllSavedPost(Request $request)
    {
        $user = Auth::id();
        $userSavedPost = Saved_post::where('user_id', $user)->with('post')->get();

        return view('savedPost')->with('userSavedPost', $userSavedPost);
    }

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
            'post_id' => 'required|integer|exists:posts,id'
        ]);

        $post_id = $request->post_id;
        $user_id = Auth::id();

        $removePost = Saved_post::where('user_id', $user_id)->where('post_id', $post_id)->first();

        if(!$removePost){
            return response()->back()->with('Failed', 'Failed to delete');
        }
        else{
            $removePost->delete();
            return redirect()->back()->with('success', 'Unsave post');
        }
    }
}