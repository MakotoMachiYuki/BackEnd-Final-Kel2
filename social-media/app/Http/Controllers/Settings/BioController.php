<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BioController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('bio.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'pronouns' => 'nullable|string',
            'bio' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->bio = $request->input('bio');
        $user->pronouns = $request->input('pronouns');
        $user->save();

        return redirect()->route('bio.edit')->with('success', 'Bio updated successfully.');
    }
}
