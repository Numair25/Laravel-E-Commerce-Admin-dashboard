<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CycleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CycleController as FrontendCycleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/cycles', [FrontendCycleController::class, 'index'])->name('cycles.index');
Route::get('/cycles/{cycle:slug}', [FrontendCycleController::class, 'show'])->name('cycles.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/about', [HomeController::class, 'about'])->name('about.index');

// Default dashboard route for Laravel Breeze compatibility
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'verified'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Cycles
    Route::resource('cycles', CycleController::class);
    Route::patch('cycles/{cycle}/toggle-publish', [CycleController::class, 'togglePublish'])->name('cycles.toggle-publish');
    Route::delete('media/{media}', [CycleController::class, 'deleteMedia'])->name('media.delete');
    
    // Categories
    Route::resource('categories', CategoryController::class);
    
    // Payment Gateways
    Route::resource('payment-gateways', PaymentGatewayController::class);
});

// Profile routes (keep existing)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Sitemap
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);

require __DIR__.'/auth.php';
