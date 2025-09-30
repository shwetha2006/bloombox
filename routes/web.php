<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\BouquetController;
use App\Http\Controllers\AddOnController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
// -----------------------
// Public Routes
// -----------------------
Route::get('/', function () {
    return view('welcome');
})->name('home');

// -----------------------
// User Authenticated Routes
// -----------------------
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

// -----------------------
// Admin Authentication Routes (Public)
// -----------------------

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});

// -----------------------
// Admin Protected Routes
// -----------------------

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
        
    Route::get('dashboard', function () {return view('admin/dashboard');})->name('admin.dashboard');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


    // -------------------------
    // Bouquet Routes
    // -------------------------
    Route::get('bouquets', [BouquetController::class, 'index'])->name('admin.bouquets.index');
    Route::get('bouquets/create', [BouquetController::class, 'createForm'])->name('admin.bouquets.create');
    Route::post('bouquets', [BouquetController::class, 'store'])->name('admin.bouquets.store');
    Route::get('bouquets/{bouquet}/edit', [BouquetController::class, 'edit'])->name('admin.bouquets.edit');
    Route::put('bouquets/{bouquet}', [BouquetController::class, 'update'])->name('admin.bouquets.update');
    Route::delete('bouquets/{bouquet}', [BouquetController::class, 'destroy'])->name('admin.bouquets.destroy');

    // -------------------------
    // Add-On Routes
    // -------------------------
    Route::get('addons', [AddOnController::class, 'index'])->name('admin.addons.index');
    Route::get('/admin/addons/create', [AddOnController::class, 'createForm'])->name('admin.addons.create');
    Route::post('addons', [AddOnController::class, 'store'])->name('admin.addons.store');
    Route::get('addons/{addon}/edit', [AddOnController::class, 'edit'])->name('admin.addons.edit');

    // Update (PUT)
    Route::put('addons/{addon}', [AddOnController::class, 'update'])->name('admin.addons.update');
    Route::delete('addons/{addon}', [AddOnController::class, 'destroy'])->name('admin.addons.destroy');
    

    // -------------------------
    // Customer Routes
    // -------------------------
    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('admin.customers.show');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');


});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/bouquets', [BouquetController::class, 'customerIndex'])->name('customer.bouquets-index');
    Route::get('/bouquet/{bouquet}', [BouquetController::class, 'show'])->name('customer.bouquet-show');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/order', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/cart/confirm', [OrderController::class, 'store'])->name('cart.place');
    Route::post('/shipments', [ShipmentController::class, 'store'])->name('shipments.store');
    Route::get('/checkout/{order}', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/occasions/{category}', [BouquetController::class, 'categoryBouquets'])
    ->name('customer.category-bouquets');

});
    
// routes/web.php
Route::get('/orders', [OrderController::class, 'index'])->name('customer.orders')->middleware('auth');
Route::get('/wishlist', function(){
    return view('customer.wishlist');
})->name('wishlist')->middleware('auth');




