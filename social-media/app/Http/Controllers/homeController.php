<?php

namespace App\Http\Controllers;
use Session;

class homeController extends Controller
{
    public function index()
    {
        if(auth()->user())
        {
            return view('home');
        }
    }
}
