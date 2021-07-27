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
        Route::get('/login', [LoginController::class, 'renderLogin'])->name('login')->middleware('guest');
        Route::get('/register', [RegisterController::class, 'renderRegister'])->name('register')->middleware('guest');

        Route::get('/password/forgot', [PasswordController::class, 'renderPasswordForgot'])->name('password.forgot');
        Route::get('/password/reset', [PasswordController::class, 'renderPasswordReset'])->name('password.reset');

        Route::get('/email/verify', [EmailController::class, 'renderEmailVerify'])->name('email.verify');
    });

    // Third-Party-Login
    Route::group(['as' => 'socialite.'], function() {
        Route::get('/external/facebook/login', [LoginController::class, 'loginFacebook'])->name('facebook.login');
        Route::get('/external/facebook/callback/login', [LoginController::class, 'callbackFacebook'])->name('facebook.callback.login');

        Route::get('/external/github/login', [LoginController::class, 'loginGithub'])->name('github.login');
        Route::get('/external/github/callback/login', [LoginController::class, 'callbackGithub'])->name('github.callback.login');
    });

    // Third-Party-Register
    Route::group(['as' => 'socialite.'], function() {
        Route::get('/external/facebook/register', [RegisterController::class, 'registerFacebook'])->name('facebook.register');
        Route::get('/external/facebook/callback/register', [RegisterController::class, 'callbackFacebook'])->name('facebook.callback.register');

        Route::get('/external/github/register', [RegisterController::class, 'registerGithub'])->name('github.register');
        Route::get('/external/github/callback/register', [RegisterController::class, 'callbackGithub'])->name('github.callback.register');
    });

    // Requests
    Route::group(['as' => 'requests.'], function() {
        Route::post('/login', [LoginController::class, 'login'])->name('login');
    });
});
