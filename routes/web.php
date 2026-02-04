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

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Public Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', \App\Livewire\Auth\Register::class)->name('register');
});

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', \App\Livewire\Admin\Auth\Login::class)->name('login');
    });

    // Admin Dashboard Routes (requires authentication and admin role)
    Route::middleware(['auth', 'role:super_admin,website_admin'])->group(function () {
        Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');
        
        // Reservations
        Route::get('/reservations', function () {
            return view('admin.reservations.index');
        })->name('reservations.index');
        
        // Rooms
        Route::get('/rooms', function () {
            return view('admin.rooms.index');
        })->name('rooms.index');
        
        // Facilities
        Route::get('/facilities', function () {
            return view('admin.facilities.index');
        })->name('facilities.index');
        
        // Attractions
        Route::get('/attractions', function () {
            return view('admin.attractions.index');
        })->name('attractions.index');
        
        // Amenities
        Route::get('/amenities', function () {
            return view('admin.amenities.index');
        })->name('amenities.index');
        
        // Blogs
        Route::get('/blogs', function () {
            return view('admin.blogs.index');
        })->name('blogs.index');
        
        // Gallery
        Route::get('/gallery', function () {
            return view('admin.gallery.index');
        })->name('gallery.index');
        
        // Slide Images
        Route::get('/slide-images', function () {
            return view('admin.slide-images.index');
        })->name('slide-images.index');
        
        // Settings (Single page with tabs)
        Route::get('/settings', \App\Livewire\Admin\Settings::class)->name('settings.index');
        
        // Users (Super Admin only)
        Route::middleware('role:super_admin')->group(function () {
            Route::get('/users', function () {
                return view('admin.users.index');
            })->name('users.index');
        });
    });
});

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');
