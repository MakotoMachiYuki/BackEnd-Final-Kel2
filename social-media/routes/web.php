<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\savedPostController;
use App\Http\Controllers\postController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\creatorController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

use App\Http\Controllers\Settings\verifyAccountController;
use App\Http\Controllers\Settings\ChangeAccountInformationController;


Route::group(['middleware' => 'auth'], function()
{
    Route::get('/',[homeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/post', [postController::class, 'create']) -> name('create');
    Route::post('/post', [postController::class, 'createPost']) -> name('createPost');
    
    Route::get('/post', function() {
        return view('post');
    });

    Route::get('/about', function () {
        return view('about');
    });
    
    Route::get('/settings', function () {
        return view('settings');
    });

    
    Route::post('/save-post', [savedPostController::class, 'addSavedPost'])->name('addSavedPost');
    
    Route::post('/create_creator', [CreatorController::class, 'createCreator'])->name('createCreator');
    
    Route::post('/post/{id}/like', [postController::class, 'likePost'])->name('likePost');
    
    Route::get('/dashboard', function () {
        return view('dasboard.index');
    });

    Route::post('/verifyAccount', [verifyAccountController::class, 'verifyAccount']) -> name('verifyAccount');
    Route::get('/verifyAccount', [verifyAccountController::class, 'verifyAccountIndex']) -> name('verifyAccountIndex');

    Route::get('/change_account_information',[ChangeAccountInformationController::class, 'ChangeAccountInformationIndex'])-> name('ChangeAccountInformationIndex');
});

Route::get('/logout', [loginController::class, 'logout']) ->name('logout');

Route::get('/login', [loginController::class, 'login']) -> name('login');
Route::post('/login', [loginController::class, 'loginAccount']) -> name('loginAccount');

Route::get('/create_account', [registerController::class, 'register']) -> name('register');
Route::post('/create_account', [registerController::class, 'registerAccount']) -> name('registerAccount');


Route::get('/forgot-password', [ForgotPasswordController::class,'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'verifyUsername'])->name('verifyUsername');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('reset');



