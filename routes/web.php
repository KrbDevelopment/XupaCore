<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\TestController;

// Core
use App\Http\Controllers\Core\ProfileController;
use App\Http\Controllers\Core\NotificationController;
use App\Http\Controllers\Core\UserAssetController;
use App\Http\Controllers\Core\AccountController;

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
        Route::post('/profile/general', [ProfileController::class, 'updateProfile'])->name('general'); // Update general user information
        Route::post('/profile/security', [ProfileController::class, 'changePassword'])->name('password.change'); // Change users password
        Route::post('/profile/notifications', [ProfileController::class, 'updatePreferences'])->name('preferences.change'); // Change users password
        Route::post('/profile/banner', [ProfileController::class, 'updateBanner'])->name('banner.update'); // Change users banner
        Route::post('/profile/profile_image', [ProfileController::class, 'updateProfileImage'])->name('profile_image.update'); // Change users profile image
    });
});

// Routes of Account management core
Route::group(['as' => 'accounts.', 'middleware' => 'auth'], function() {
    // Render Pages
    Route::group(['as' => 'render.'], function() {
        Route::get('/accounts', [AccountController::class, 'renderAccountsOverview'])->name('accounts.overview'); // Render Accounts Overview Page
        Route::get('/account/{user}/details', [AccountController::class, 'renderAccountDetails'])->name('account.details'); // Render Account Detail Page
        Route::get('/account/{user}/details/general', [AccountController::class, 'renderAccountGeneralDetails'])->name('account.details.general'); // Render Account Detail Page (General Tab)
        Route::get('/account/{user}/details/security', [AccountController::class, 'renderAccountSecurityDetails'])->name('account.details.security'); // Render Account Detail Page (General Tab)
    });

    // Requests
    Route::group(['as' => 'requests.'], function() {
        Route::post('/accounts/create', [AccountController::class, 'createAccount'])->name('account.create');
        Route::delete('/accounts/delete/{user}/single', [AccountController::class, 'deleteSingleAccount'])->name('account.delete.single');
        Route::delete('/accounts/delete/array', [AccountController::class, 'deleteAccountArray'])->name('account.delete.array');
        Route::post('/account/{user}/details/general', [AccountController::class, 'updateAccount'])->name('account.update.general'); // Update User informations (General Tab)
        Route::post('/account/{user}/details/security/password', [AccountController::class, 'changePassword'])->name('account.change.password'); // Update User password (Security Tab)

        Route::post('/account/{user}/details/security/notify/password_changed', [AccountController::class, 'sendPasswordChangedNotification'])->name('account.notify.password_changed');
        Route::post('/account/{user}/details/security/notify/verify_email', [AccountController::class, 'sendVerifyEmailNotification'])->name('account.notify.verify_email');
        Route::post('/account/{user}/details/security/notify/reset_password', [AccountController::class, 'sendResetPasswordNotification'])->name('account.notify.reset_password');
    });
});

// Routes of User core
Route::group(['as' => 'user.', 'middleware' => 'auth'], function() {
    Route::get('/user/{user}/banner', [UserAssetController::class, 'getProfileBanner'])->name('banner');
    Route::get('/user/{user}/profile_image', [UserAssetController::class, 'getProfileImage'])->name('profile_image');
});

// Routes of Notifications
Route::group(['as' => 'notifications.', 'prefix' => 'notifications', 'middleware' => 'auth'], function() {
    // Render
    Route::group(['as' => 'render.'], function() {
       Route::get('/', [NotificationController::class, 'renderNotificationCenter'])->name('notifications');
    });

    // Requests
    Route::group(['as' => 'requests.'], function() {
        Route::post('/read/single', [NotificationController::class, 'markAsReadSingle'])->name('read.single');
        Route::post('/read/array', [NotificationController::class, 'markAsReadArray'])->name('read.array');

        Route::post('/dismiss/single', [NotificationController::class, 'deleteNotificationsSingle'])->name('dismiss.single');
        Route::post('/dismiss/array', [NotificationController::class, 'deleteNotificationsArray'])->name('dismiss.array');
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
        Route::get('/external/facebook', [LoginController::class, 'loginFacebook'])->name('facebook');
        Route::get('/external/facebook/callback', [LoginController::class, 'callbackFacebook'])->name('facebook.callback');

        Route::get('/external/github', [LoginController::class, 'loginGithub'])->name('github');
        Route::get('/external/github/callback', [LoginController::class, 'callbackGithub'])->name('github.callback');
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
