<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class BioController extends Controller
{   
    public function update(Request $request)
    {
        $messages =
        [
            "pronoun.max" => "Your pronoun must not be longer than 10 characters!",
            "bio.max" => "Your bio must not be longer than 255 characters!",
        ];

        $validator = Validator::make($request -> all(),
        [
            'pronoun' => 'nullable|string|max:10',
            'bio' => 'nullable|string|max:255',
        ],$messages);

        if($validator->fails())
        {
            return back()->withInput($request->all())->withErrors($validator);
        } 


        $user_id = $request->user_id;

        $user = User::where('id', $user_id)
        ->update([
            'bio' => $request->bio,
            'pronoun' => $request->pronoun,
        ]);

        return redirect()->back()->withInput($request->all());

    }
}
