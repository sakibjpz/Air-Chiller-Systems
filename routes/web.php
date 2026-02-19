<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\ProductLineupController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SolutionController as AdminSolutionController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\ProductLineupController as AdminProductLineupController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\BannerSlideController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SolutionGalleryController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Product search
Route::get('/search/products', [App\Http\Controllers\ProductController::class, 'search'])->name('search.products');

// Services (Dynamic)
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Solutions (Dynamic)
Route::get('/solutions', [SolutionController::class, 'index'])->name('solutions.index');
Route::get('/solutions/{slug}', [SolutionController::class, 'show'])->name('solutions.show');

// Product Lineups (Dynamic)
Route::get('/product-lineups', [ProductLineupController::class, 'index'])->name('product-lineups.index');
Route::get('/product-lineups/{slug}', [ProductLineupController::class, 'show'])->name('product-lineups.show');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Clients
Route::get('/clients', function () {
    $clients = \App\Models\Client::active()->ordered()->get();
    return view('frontend.clients.index', compact('clients'));
})->name('clients');

// About Us
// Route::get('/about-us', function () {
//     return view('frontend.about.index');
// })->name('about');

// Public about page routes
Route::get('/about-us', [App\Http\Controllers\AboutPageController::class, 'show'])->name('about.show');

// Contact
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Requires Login)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    
    // Admin Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    // Admin Products
    Route::prefix('admin/products')->name('admin.products.')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('/create', [AdminProductController::class, 'create'])->name('create');
        Route::post('/', [AdminProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [AdminProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [AdminProductController::class, 'update'])->name('update');
        Route::delete('/{product}', [AdminProductController::class, 'destroy'])->name('destroy');
    });

    // Admin Categories
    Route::resource('/admin/categories', CategoryController::class)->names('admin.categories');

    // Admin Core Values
    Route::resource('/admin/core-values', CoreValueController::class)->names('admin.core-values');

    // Admin Solutions
    Route::resource('/admin/solutions', AdminSolutionController::class)->names('admin.solutions');

    // Admin Product Lineups
    Route::resource('/admin/product-lineups', AdminProductLineupController::class)->names('admin.product-lineups');

    // Admin Certifications
    Route::resource('/admin/certifications', CertificationController::class)->names('admin.certifications');

    // Admin Contact Messages
    Route::resource('/admin/contact-messages', App\Http\Controllers\Admin\ContactMessageController::class)->names('admin.contact-messages')->except(['create', 'store', 'edit', 'update']);
    Route::patch('/admin/contact-messages/{contactMessage}/replied', [App\Http\Controllers\Admin\ContactMessageController::class, 'markAsReplied'])->name('admin.contact-messages.replied');

    // Admin Gallery
    Route::resource('/admin/galleries', GalleryController::class)->names('admin.galleries');

    // Admin Clients
    Route::resource('/admin/clients', ClientController::class)->names('admin.clients');

    // Admin News
    Route::resource('/admin/news', AdminNewsController::class)->names('admin.news');

    // Admin Banner Slides
    Route::resource('/admin/banner-slides', BannerSlideController::class)->names('admin.banner-slides');

    // Admin Videos
    Route::resource('/admin/videos', VideoController::class)->names('admin.videos');

    // Admin Services
    Route::resource('/admin/services', AdminServiceController::class)->names('admin.services');

    // Admin about pages routes
Route::resource('/admin/about', App\Http\Controllers\Admin\AboutPageController::class)->names('admin.about');

// Admin Contact Settings
Route::get('/admin/contact-settings', [App\Http\Controllers\Admin\ContactSettingController::class, 'edit'])->name('admin.contact-settings.edit');
Route::put('/admin/contact-settings', [App\Http\Controllers\Admin\ContactSettingController::class, 'update'])->name('admin.contact-settings.update');

    // Admin Solution Gallery (Nested under solutions)
    Route::prefix('admin/solutions/{solution}/galleries')->name('admin.solutions.galleries.')->group(function () {
        Route::get('/', [SolutionGalleryController::class, 'index'])->name('index');
        Route::get('/create', [SolutionGalleryController::class, 'create'])->name('create');
        Route::post('/', [SolutionGalleryController::class, 'store'])->name('store');
        Route::get('/{gallery}/edit', [SolutionGalleryController::class, 'edit'])->name('edit');
        Route::put('/{gallery}', [SolutionGalleryController::class, 'update'])->name('update');
        Route::delete('/{gallery}', [SolutionGalleryController::class, 'destroy'])->name('destroy');
    });
});

// Authentication routes
require __DIR__.'/auth.php';