<?php

use App\Http\Controllers\User\ForgotPasswordController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Controllers\User\SocialiteController;
use App\Http\Controllers\User\UserController;

Route::middleware('guest')->prefix('auth')->as('auth.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/check-user', [RegisterController::class, 'checkUser'])->name('checkUser');

    Route::prefix('password')->as('password.')->group(function () {
        Route::get('/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('request');
        Route::post('/email', [ForgotPasswordController::class, 'sendResetCodeEmail'])->name('email');
        Route::get('/code-verify', [ForgotPasswordController::class, 'codeVerify'])->name('code.verify');
        Route::post('/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('verify.code');

        Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('reset');
        Route::post('/reset/{token}', [ResetPasswordController::class, 'reset'])->name('update');
    });

    Route::get('/social-login/{provider}', [SocialiteController::class, 'socialLogin'])->name('social.login');
    Route::get('/social-login/callback/{provider}', [SocialiteController::class, 'callback'])->name('social.login.callback');
});

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'profile'])->name('profile');
        Route::post('/', [UserController::class, 'profileUpdate'])->name('profile.update');
        Route::get('/password', [UserController::class, 'password'])->name('password');
        Route::post('/password', [UserController::class, 'passwordUpdate'])->name('password.update');
    });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});