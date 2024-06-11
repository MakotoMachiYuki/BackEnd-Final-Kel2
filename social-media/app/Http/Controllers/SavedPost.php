<?php
namespace App\Http\Controllers;

use App\Models\SavedPost;
use Iluminate\Http\Request;

class savedPostController extends Controller
{
    public function savedPost(Request $request)
    {
        $user = SavedPost::create([
            'creator_id' => $request->creator_id,
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'saved_date' => $request->saved_date,
        ]);

        return response("Post saved", 200);   
    }
}
?>