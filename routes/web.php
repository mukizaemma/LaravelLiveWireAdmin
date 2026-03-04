<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public frontend (temporary minimal public site)
Route::get('/', \App\Livewire\Frontend\Home::class)->name('home');

// Public Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');
});

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', \App\Livewire\Admin\Auth\Login::class)->name('login');
        Route::get('/password/forgot', \App\Livewire\Admin\Auth\ForgotPassword::class)->name('password.request');
        Route::get('/password/reset/{token}', \App\Livewire\Admin\Auth\ResetPassword::class)->name('password.reset');
    });

    // Admin Dashboard, Settings & Users Routes (requires authentication and admin role)
    Route::middleware(['auth', 'role:super_admin,website_admin'])->group(function () {
        Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
        Route::get('/settings', \App\Livewire\Admin\Settings::class)->name('settings.index');
        // Users & staff management
        Route::get('/users', \App\Livewire\Admin\Users\Index::class)->name('users.index');
    });
});

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');
