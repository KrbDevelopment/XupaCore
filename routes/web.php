<?php
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\TestController;

// Authentication
use App\Http\Controllers\Authentication\EmailController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\PasswordController;
use App\Http\Controllers\Authentication\RegisterController;

Route::get('/', [TestController::class, 'index'])->name('home');

// Routes of authentication core
Route::group(['as' => 'auth.'], function() {
    // Render Pages
    Route::group(['as' => 'render.'], function() {
        Route::get('/login', [LoginController::class, 'renderLogin'])->name('login');
        Route::get('/register', [RegisterController::class, 'renderRegister'])->name('register');

        Route::get('/password/forgot', [PasswordController::class, 'renderPasswordForgot'])->name('password.forgot');
        Route::get('/password/reset', [PasswordController::class, 'renderPasswordReset'])->name('password.reset');

        Route::get('/email/verify', [EmailController::class, 'renderEmailVerify'])->name('email.verify');
    });

    // Third-Party-Login
    Route::group(['as' => 'socialite.'], function() {
        Route::get('/external/facebook', [LoginController::class, 'loginFacebook'])->name('facebook');
        Route::get('/external/facebook/callback', [LoginController::class, 'callbackFacebook'])->name('facebook.callback');

        Route::get('/external/github', [LoginController::class, 'loginGithub'])->name('github');
        Route::get('/external/github/callback', [LoginController::class, 'callbackGithub'])->name('github.callback');
    });

    // Requests
    Route::group(['as' => 'requests.'], function() {
        Route::post('/login', [LoginController::class, 'login'])->name('login');
    });
});
