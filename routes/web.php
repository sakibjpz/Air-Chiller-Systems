<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\ProductLineupController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;










Route::get('/', [HomeController::class, 'index'])->name('home');

// Public product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/about-us', function () {
    return view('frontend.about.index');
})->name('about');

Route::get('/services', function () {
    return view('frontend.services.index');
})->name('services');

//solution route
Route::get('/solutions/hospital', function () {
    return view('solutions.hospital');
})->name('solutions.hospital');

Route::get('/solutions/shopping-mall', function () {
    return view('solutions.shopping-mall');
})->name('solutions.shopping-mall');

Route::get('/solutions/hotel', function () {
    return view('solutions.hotel');
})->name('solutions.hotel');

Route::get('/solutions/office', function () {
    return view('solutions.office');
})->name('solutions.office');

Route::get('/solutions/retail', function () {
    return view('solutions.retail');
})->name('solutions.retail');

Route::get('/solutions/residence', function () {
    return view('solutions.residence');
})->name('solutions.residence');


// Public client routes
Route::get('/clients', function () {
    $clients = \App\Models\Client::active()->ordered()->get();
    return view('frontend.clients.index', compact('clients'));
})->name('clients');

// Contact page route
Route::get('/contact', function () {
    return view('frontend.contact.index');
})->name('contact');


// News routes
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Admin dashboard route
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
    
    // Admin products routes
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');


// Edit product routes
Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');


// Admin categories routes
Route::resource('/admin/categories', \App\Http\Controllers\Admin\CategoryController::class)->names('admin.categories');

// Admin core values routes
Route::resource('/admin/core-values', CoreValueController::class)->names('admin.core-values');

// Admin solutions routes
Route::resource('/admin/solutions', SolutionController::class)->names('admin.solutions');

// Admin product lineups routes
Route::resource('/admin/product-lineups', ProductLineupController::class)->names('admin.product-lineups');

// Admin certifications routes
Route::resource('/admin/certifications', \App\Http\Controllers\Admin\CertificationController::class)->names('admin.certifications');

// Admin gallery routes
Route::resource('/admin/galleries', \App\Http\Controllers\Admin\GalleryController::class)->names('admin.galleries');


// Admin clients routes
Route::resource('/admin/clients', ClientController::class)->names('admin.clients');

// Admin news routes
Route::resource('/admin/news', \App\Http\Controllers\Admin\NewsController::class)->names('admin.news');

// Admin banner slides routes
Route::resource('/admin/banner-slides', \App\Http\Controllers\Admin\BannerSlideController::class)->names('admin.banner-slides');

// Admin video routes
Route::resource('/admin/videos', VideoController::class)->names('admin.videos');

});

require __DIR__.'/auth.php';