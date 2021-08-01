<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\TestController;

// Core
use App\Http\Controllers\Core\ProfileController;
use App\Http\Controllers\Core\NotificationController;
use App\Http\Controllers\Core\PermissionController;

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
    });
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

// Routes of Authentication core
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

// Routes of Permissions core
Route::group(['as' => 'permissions.', 'middleware' => 'auth'], function() {
    // Render
    Route::group(['as' => 'render.'], function() {
        Route::get('/roles', [PermissionController::class, 'render_roles'])->name('roles');

        Route::get('/roles/{role}', [PermissionController::class, 'render_role_details_settings'])->name('roles.detail');
        Route::get('/roles/{role}/settings', [PermissionController::class, 'render_role_details_settings'])->name('roles.detail.settings');
        Route::get('/roles/{role}/access', [PermissionController::class, 'render_role_details_access'])->name('roles.detail.access');
        Route::get('/roles/{role}/notifications', [PermissionController::class, 'render_role_details_notifications'])->name('roles.detail.notifications');
        Route::get('/roles/{role}/integrations', [PermissionController::class, 'render_role_details_integrations'])->name('roles.detail.integrations');

        Route::get('/permissions', [PermissionController::class, 'render_permissions'])->name('permissions');
        Route::get('/permissions/{permission}', [PermissionController::class, 'render_permission_details'])->name('permissions.detail');
    });

    // Requests
    Route::group(['as' => 'requests.'], function() {
        Route::post('/roles', [PermissionController::class, 'create_role'])->name('role.create');
        Route::delete('/roles/single', [PermissionController::class, 'delete_role_single'])->name('role.delete.single');
        Route::delete('/roles/array', [PermissionController::class, 'delete_role_array'])->name('role.delete.array');
        Route::post('/roles/{role}', [PermissionController::class, 'update_role'])->name('role.update');
        Route::put('/roles/{role}/{permission}', [PermissionController::class, 'attach_permission_on_role'])->name('role.permission.attach');
        Route::delete('/roles/{role}/{permission}', [PermissionController::class, 'detach_permission_on_role'])->name('role.permission.detach');
    });
});
