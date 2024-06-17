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
            'user_id' => Auth()::id,
            'post_id' => $request->post_id,
            'saved_date' => now(),
        ]);

        return redirect('home');   
    }

    public function removeSavedPost(Request $request, $id)
    {
        $removePost = Saved_post::findOrFail($id);

        if($removePost->user_id !== Auth::id()){
            return response()->view('error.custom', [], 500);
        }

        session()->flash('success', 'Post saved successfully.');

        return redirect()->back();
    }
}