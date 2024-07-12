<?php


use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Middleware\CheckRole;

Route::resource('sekolahs', SekolahController::class);
Route::resource('siswas', SiswaController::class);

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function() {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware(CheckRole::class . ':admin');

    Route::get('user/dashboard', function() {
        return view('user.dashboard');
    })->name('user.dashboard')->middleware(CheckRole::class . ':user');
});
