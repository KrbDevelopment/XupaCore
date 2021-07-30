<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\TestController;

// Core
use App\Http\Controllers\Profile\ProfileController;

// Authentication
use App\Http\Controllers\Core\Authentication\LoginController;
use App\Http\Controllers\Core\Authentication\RegisterController;
use App\Http\Controllers\Core\Authentication\ForgotPasswordController;
use App\Http\Controllers\Core\Authentication\ConfirmPasswordController;
use App\Http\Controllers\Core\Authentication\ResetPasswordController;
use App\Http\Controllers\Core\Authentication\EmailController;

Route::get('/', [TestController::class, 'index'])->name('home')->middleware('auth');

// Routes of Profile core
Route::group(['as' => 'profile.', 'middleware' => 'auth'], function() {
    // Render Pages
    Route::group(['as' => 'render.'], function() {
        Route::get('/profile/general', [ProfileController::class, 'renderProfileGeneral'])->name('general'); // General Profile Page
        Route::get('/profile/security', [ProfileController::class, 'renderProfileSecurity'])->name('security'); // Security Profile Page
        Route::get('/profile/notifications', [ProfileController::class, 'renderProfileNotifications'])->name('notifications'); // Security Profile Page
    });

    // Requests
    Route::group(['as' => 'requests.'], function() {
        Route::post('/profile/general', [ProfileController::class, 'updateProfile'])->name('general'); // Update general user informations
        Route::post('/profile/security', [ProfileController::class, 'changePassword'])->name('password.change'); // Change users password
    });
});

// Routes of authentication core
Route::group(['as' => 'auth.', 'middleware' => 'guest'], function() {
    // Render Pages
    Route::group(['as' => 'render.'], function() {
        Route::get('/login', [LoginController::class, 'renderLogin'])->name('login');
        Route::get('/register', [RegisterController::class, 'renderRegister'])->name('register');

        Route::get('/password/forgot', [ForgotPasswordController::class, 'renderPasswordForgot'])->name('password.forgot');
        Route::get('/password/reset', [ResetPasswordController::class, 'renderPasswordReset'])->name('password.reset');
        Route::get('/password/confirm', [ConfirmPasswordController::class, 'renderPasswordConfirm'])->name('password.confirm')->withoutMiddleware('guest');

        Route::get('/email/verify', [EmailController::class, 'renderEmailVerify'])->name('email.verify')->withoutMiddleware('guest');
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
        Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm'])->name('password.confirm')->withoutMiddleware('guest');

        Route::post('/email/verify', [EmailController::class, 'verify'])->name('email.verify')->withoutMiddleware('guest');
    });
});
