<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Admin\FashionController as AdminFashionController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FashionController as FrontendFashionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/search', [HomeController::class, 'search'])->name('search');
// Products routes
Route::get('/products', [FrontendProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [FrontendProductController::class, 'show'])->name('products.show');

// New Products routes (alias and replacement)
Route::get('/fashions', [FrontendFashionController::class, 'index'])->name('fashions.index');
Route::get('/fashions/{fashion}', [FrontendFashionController::class, 'show'])->name('fashions.show');
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

    // Legacy cycles routes removed — replaced by products

    // Products (new)
    Route::resource('products', AdminProductController::class);
    Route::patch('products/{product}/toggle-publish', [AdminProductController::class, 'togglePublish'])->name('products.toggle-publish');
    Route::delete('media/{media}', [AdminProductController::class, 'deleteMedia'])->name('admin.media.delete');

    // Fashions
    Route::resource('fashions', AdminFashionController::class);

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
