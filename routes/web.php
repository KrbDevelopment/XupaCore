<?php
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\TestController;

// Authentication
use App\Http\Controllers\Authentication\EmailController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\PasswordController;
use App\Http\Controllers\Authentication\RegisterController;

Route::get('/', [TestController::class, 'index']);

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
});
