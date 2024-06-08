<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardPostController;


Route::get('/', function () {
    return view('home');
});

Route::get('/post', function () {
    return view('post');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/create_account', function () {
    return view('create_account');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/settings', function () {
    return view('settings');
});


Route::get('/dashboard', function () {
    return view('dasboard.index');
})->middleware('auth');


route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');