<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
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