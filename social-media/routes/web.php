<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\postController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;


Route::get('/',[homeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/post', function() {
    return view('post');
});

Route::get('/post', [postController::class, 'create']) -> name('create');
Route::post('/post', [postController::class, 'createPost']) -> name('createPost');

Route::get('/login', [loginController::class, 'login']) -> name('login');
Route::post('/login', [loginController::class, 'loginAccount']) -> name('loginAccount');
Route::get('/', [loginController::class, 'logout']) ->name('logout')->middleware('auth');

Route::get('/create_account', [registerController::class, 'register']) -> name('register');
Route::post('/create_account', [registerController::class, 'registerAccount']) -> name('registerAccount');

Route::get('/about', function () {
    return view('about');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/forgot-password', [ForgotPasswordController::class,'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendReset'])->name('sendReset');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset');

// Route::get('/reset-password/{token}', function($token) {
//     return view('reset-password', ['token'=>$token]);
// })->middleware('guest')->name('password.reset');

// Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset');


// Route::get('/forgot-password', function() {
//     return view('forgot-password');
// })->middleware('guest')->name('password.request');

// Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetlinkEmail'])->name('sendResetlinkEmail');

// Route::get('/reset-password/{token}', function(string $token) {
//     return view('reset-password', ['token'=>$token]);
// })->middleware('guest')->name('password.reset');

// Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset');

// Route::get('/dashboard', function () {
//     return view('dasboard.index');
// })->middleware('auth');




