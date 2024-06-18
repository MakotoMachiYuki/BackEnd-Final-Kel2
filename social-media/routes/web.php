<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\savedPostController;
use App\Http\Controllers\postController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\creatorController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\resetPasswordController;


Route::get('/',[homeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/post', function() {
    return view('post');
});

Route::get('/post', [postController::class, 'create']) -> name('create');
Route::post('/post', [postController::class, 'createPost']) -> name('createPost');

Route::get('/login', [loginController::class, 'login']) -> name('login');
Route::post('/login', [loginController::class, 'loginAccount']) -> name('loginAccount');
Route::get('/logout', [loginController::class, 'logout']) ->name('logout')->middleware('auth');

Route::get('/create_account', [registerController::class, 'register']) -> name('register');
Route::post('/create_account', [registerController::class, 'registerAccount']) -> name('registerAccount');

Route::get('/about', function () {
    return view('about');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/dashboard', function () {
    return view('dasboard.index');
})->middleware('auth');

Route::post('/save-post', [savedPostController::class, 'addSavedPost'])->name('addSavedPost')->middleware('auth');

Route::post('/create_creator', [CreatorController::class, 'createCreator'])->name('createCreator')->middleware('auth');

Route::get('/forgot-password', [forgotPasswordController::class,'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [forgotPasswordController::class, 'verifyUsername'])->name('verifyUsername');
Route::post('/reset-password', [resetPasswordController::class, 'reset'])->name('reset');


Route::post('/post/{id}/like', [postController::class, 'likePost'])->name('likePost');

