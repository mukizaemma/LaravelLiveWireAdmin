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

// Public frontend (Livewire SPA-like with wire:navigate)
Route::get('/', \App\Livewire\Frontend\Home::class)->name('home');
Route::get('/about', \App\Livewire\Frontend\About::class)->name('about');
Route::get('/contact', \App\Livewire\Frontend\Contact::class)->name('contact');
Route::get('/departments', \App\Livewire\Frontend\Departments\Index::class)->name('departments.index');
Route::get('/departments/{department}', \App\Livewire\Frontend\Departments\Show::class)->name('departments.show');
Route::get('/doctors', \App\Livewire\Frontend\Doctors\Index::class)->name('doctors.index');
Route::get('/doctors/{doctor}/{slug?}', \App\Livewire\Frontend\Doctors\Show::class)->name('doctors.show');
Route::get('/leadership', \App\Livewire\Frontend\LeadershipTeam\Index::class)->name('leadership.index');
Route::get('/leadership/{member}/{slug?}', \App\Livewire\Frontend\LeadershipTeam\Show::class)->name('leadership.show');
Route::get('/gallery', \App\Livewire\Frontend\Gallery\Index::class)->name('gallery.index');
Route::get('/appointment', \App\Livewire\Frontend\Appointment::class)->name('appointment');
Route::get('/feedback', \App\Livewire\Frontend\FeedbackForm::class)->name('feedback');

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

    // Admin Dashboard Routes (requires authentication and admin role)
    Route::middleware(['auth', 'role:super_admin,website_admin'])->group(function () {
        Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');

        // Hospital info & settings (single page with tabs)
        Route::get('/settings', \App\Livewire\Admin\Settings::class)->name('settings.index');

        // Clinical departments & services
        Route::get('/departments', \App\Livewire\Admin\Departments\Index::class)->name('departments.index');
        Route::get('/services', \App\Livewire\Admin\Services\Index::class)->name('services.index');
        Route::get('/doctors', \App\Livewire\Admin\Doctors\Index::class)->name('doctors.index');
        Route::get('/leadership-team', \App\Livewire\Admin\LeadershipTeam\Index::class)->name('leadership-team.index');

        // Partners
        Route::get('/partners', \App\Livewire\Admin\Partners\Index::class)->name('partners.index');

        // Home sliders & media
        Route::get('/sliders', \App\Livewire\Admin\Sliders\Index::class)->name('sliders.index');
        Route::get('/gallery', \App\Livewire\Admin\Gallery\Index::class)->name('gallery.index');

        // Page headers
        Route::get('/page-headers', \App\Livewire\Admin\PageHeaders\Index::class)->name('page-headers.index');

        // Users & staff management (both roles can access, component enforces per-role permissions)
        Route::get('/users', \App\Livewire\Admin\Users\Index::class)->name('users.index');

        // Feedback reports dashboard
        Route::get('/feedback', \App\Livewire\Admin\Feedback\Index::class)->name('feedback.index');

        // Contact messages
        Route::get('/contact-messages', \App\Livewire\Admin\ContactMessages\Index::class)->name('contact-messages.index');
    });
});

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');
