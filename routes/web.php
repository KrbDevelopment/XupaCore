<?php

use App\Http\Controllers\Authentication\ConfirmPasswordController;
use App\Http\Controllers\Authentication\ResetPasswordController;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\TestController;

// Authentication
use App\Http\Controllers\Authentication\EmailController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\ForgotPasswordController;
use App\Http\Controllers\Authentication\RegisterController;

Route::get('/', [TestController::class, 'index'])->name('home')->middleware('auth');

// Routes of authentication core
Route::group(['as' => 'auth.', 'middleware' => 'guest'], function() {
    // Render Pages
    Route::group(['as' => 'render.'], function() {
        Route::get('/login', [LoginController::class, 'renderLogin'])->name('login');
        Route::get('/register', [RegisterController::class, 'renderRegister'])->name('register');

        Route::get('/password/forgot', [ForgotPasswordController::class, 'renderPasswordForgot'])->name('password.forgot');
        Route::get('/password/reset', [ResetPasswordController::class, 'renderPasswordReset'])->name('password.reset');
        Route::get('/password/confirm', [ConfirmPasswordController::class, 'renderPasswordConfirm'])->name('password.confirm');

        Route::get('/email/verify', [EmailController::class, 'renderEmailVerify'])->name('email.verify');
    });

    // Third-Party-Login
    Route::group(['as' => 'socialite.'], function() {
        Route::get('/external/facebook/login', [LoginController::class, 'loginFacebook'])->name('facebook');
        Route::get('/external/facebook/callback/login', [LoginController::class, 'callbackFacebook'])->name('facebook.callback');

        Route::get('/external/github/login', [LoginController::class, 'loginGithub'])->name('github');
        Route::get('/external/github/callback/login', [LoginController::class, 'callbackGithub'])->name('github.callback');
    });

    // Requests
    Route::group(['as' => 'requests.'], function() {
        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/register', [RegisterController::class, 'register'])->name('register');

        Route::post('/password/forgot', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.forgot');
        Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');
        Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm'])->name('password.confirm');
    });
});
