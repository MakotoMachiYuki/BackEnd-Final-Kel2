<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\postController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;

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


Route::get('/dashboard', function () {
    return view('dasboard.index');
})->middleware('auth');

Route::post('/post/{id}/like', [postController::class, 'likePost'])->name('likePost');