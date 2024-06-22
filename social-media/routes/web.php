<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\savedPostController;
use App\Http\Controllers\postController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\creatorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\forgotPasswordController;
use  App\Http\Controllers\resetPasswordController;
use App\Http\Controllers\deleteAccountController;
use App\Http\Controllers\Settings\verifyAccountController;
use App\Http\Controllers\Settings\ChangeAccountInformationController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ProfileController;



Route::group(['middleware' => 'auth'], function()
{
    Route::get('/',[homeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/post', [postController::class, 'create']) -> name('create');
    Route::post('/post', [postController::class, 'createPost']) -> name('createPost');
    
    Route::get('/post', function() {
        return view('post');
    });

    Route::get('/profile/{id}', [ProfileController::class, 'accProfile'])->name('accProfile');
     
    Route::get('/profile', function () {
        return view('profile');
    });

    Route::post('/save-post', [savedPostController::class, 'addSavedPost'])->name('addSavedPost');
    
    Route::post('/create_creator', [CreatorController::class, 'createCreator'])->name('createCreator');
    
    Route::post('/post/{id}/like', [postController::class, 'likePost'])->name('likePost');
    
    Route::get('/dashboard', function () {
        return view('dasboard.index');
    });

    Route::post('/save-post', [savedPostController::class, 'addSavedPost'])->name('addSavedPost');
    Route::post('/create_creator', [CreatorController::class, 'createCreator'])->name('createCreator');

    Route::post('/save_post', [savedPostController::class, 'addSavedPost'])->name('addSavedPost');
    Route::post('/remove_post', [savedPostController::class, 'removeSavedPost'])->name('removeSavedPost');
    Route::post('/user_saved_post', [savedPostController::class, 'userAllSavedPost'])->name('userAllSavedPost');
    
    Route::post('/post/{id}/like', [postController::class, 'likePost'])->name('likePost');
    Route::post('/posts/comments', [CommentController::class, 'store'])->name('commentsroute');
    Route::get('/posts/comments', [CommentController::class, 'getComment'])->name('getComment');
    
    Route::post('/follow/{user}', [FollowerController::class, 'followUser'])->name('follow');
    Route::post('/search', [RegisterController::class, 'searchUser'])->name('searchUser');

  
    Route::get('/settings', function ()
    {
        return view('settings');
    });
  
    Route::prefix('settings')->group(function ()
    {   
        Route::get('/delete-account', function(){ return view('deleteAccount');});
        Route::post('/delete-account', [deleteAccountController::class, 'deleteAccount']);
        Route::post('/verifyAccount', [verifyAccountController::class, 'verifyAccount']) -> name('verifyAccount');
        Route::get('/verifyAccount', [verifyAccountController::class, 'verifyAccountIndex']) -> name('verifyAccountIndex');
        Route::get('/change_account_information',[ChangeAccountInformationController::class, 'ChangeAccountInformationIndex'])-> name('ChangeAccountInformationIndex');

        Route::prefix('change_account_information')->group(function()
        {
            Route::get('/changeEmail', [ChangeAccountInformationController::class, 'changeEmailIndex'])->name('changeEmailIndex');
            Route::post('/changeEmail', [ChangeAccountInformationController::class, 'changeEmail'])->name('changeEmail');

            Route::get('/changeUsername', [ChangeAccountInformationController::class, 'changeUsernameIndex'])->name('changeUsernameIndex');
            Route::post('/changeUsername', [ChangeAccountInformationController::class, 'changeUsername'])->name('changeUsername');

            Route::get('/changePassword', [ChangeAccountInformationController::class, 'changePasswordIndex'])->name('changePasswordIndex');
            Route::post('/changePassword', [ChangeAccountInformationController::class, 'changePassword'])->name('changePassword');
        });
    });
  

});

Route::get('/logout', [loginController::class, 'logout']) ->name('logout');

Route::get('/login', [loginController::class, 'login']) -> name('login');
Route::post('/login', [loginController::class, 'loginAccount']) -> name('loginAccount');

Route::get('/create_account', [registerController::class, 'register']) -> name('register');
Route::post('/create_account', [registerController::class, 'registerAccount']) -> name('registerAccount');

Route::get('/forgot-password', [forgotPasswordController::class,'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [forgotPasswordController::class, 'verifyUsername'])->name('verifyUsername');

Route::post('/forgot-password/reset-password', [resetPasswordController::class, 'reset'])->name('reset');
