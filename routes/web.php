<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\TeamMemberController as AdminTeamMemberController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\MediaController as AdminMediaController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

// Auth Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('pages', AdminPageController::class);
    Route::resource('services', AdminServiceController::class);
    Route::resource('testimonials', AdminTestimonialController::class);
    Route::resource('team', AdminTeamMemberController::class);
    Route::resource('portfolio', AdminPortfolioController::class);
    Route::get('settings', [AdminSettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [AdminSettingsController::class, 'update'])->name('settings.update');
    Route::get('messages', [AdminContactMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{contactMessage}', [AdminContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{contactMessage}', [AdminContactMessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('media', [AdminMediaController::class, 'index'])->name('media.index');
    Route::post('media', [AdminMediaController::class, 'store'])->name('media.store');
    Route::delete('media/{media}', [AdminMediaController::class, 'destroy'])->name('media.destroy');
});

require __DIR__.'/auth.php';
