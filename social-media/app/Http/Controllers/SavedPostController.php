<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\SavedPost;
use Illuminate\Http\Request;

class savedPostController extends Controller
{
    public function savedPost(Request $request)
    {
        $savedPost = SavedPost::create([
            'user_id' => $request->Auth()::id,
            'post_id' => $request->post_id,
            'saved_date' => now(),
        ]);

        return redirect('home');   
    }

    public function getAllPost(Request $request){
        
    }
}