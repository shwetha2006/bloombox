<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AddOnController;
use App\Http\Controllers\BouquetController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\EventController;



// --------------------
// Admin login / logout
// --------------------
Route::post('/admin/login', [AdminAuthController::class, 'apiLogin']);
Route::post('/login', [AuthController::class, 'login']);


// --------------------
// Protected routes with token auth
// --------------------

Route::middleware(['auth:sanctum'])->group(function () {

    //customer retrive apis
    Route::get('customers', [CustomerController::class, 'index']);       

    //addons apis
    Route::get('addons', [AddOnController::class, 'index'])->name('addons.index');
    Route::post('addons', [AddOnController::class, 'store'])->name('addons.store');
    Route::get('addons/{addon}', [AddOnController::class, 'show'])->name('addons.show');
    Route::put('addons/{addon}', [AddOnController::class, 'update'])->name('addons.update'); // Update add-on
    Route::delete('addons/{addon}', [AddOnController::class, 'destroy'])->name('addons.destroy');

    //bouquet apis
    Route::post('bouquets', [BouquetController::class, 'store'])->name('bouquets.store');
    Route::get('bouquets/{bouquet}', [BouquetController::class, 'show'])->name('bouquets.show'); // <-- add this
    Route::delete('bouquets/{bouquet}', [BouquetController::class, 'destroy'])->name('bouquets.destroy'); // <-- add this
    Route::put('bouquets/{bouquet}', [BouquetController::class, 'update'])->name('bouquets.update');
    Route::get('bouquets', [BouquetController::class, 'index'])->name('api.bouquets.index');
    Route::get('bouquets/{bouquet}', [BouquetController::class, 'show'])->name('api.bouquets.show');

    //order apis
    Route::post('/orders/confirm', [OrderController::class, 'confirm']);
    Route::get('/orders/{order}', [OrderController::class, 'show']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders/{order}', [OrderController::class, 'show']);
    Route::get('/admin/orders', [OrderController::class, 'adminIndex']);

    //shipmet apis
    Route::post('/shipments', [ShipmentController::class, 'store']);
    Route::put('/shipments/{shipment}/status', [ShipmentController::class, 'updateStatus']);


    //category apis
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories', [CategoryController::class, 'index'])->name('api.categories.index');
    Route::get('categories/{category}', [CategoryController::class, 'show']); 
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    //event apis

    Route::delete('/events/{id}', [EventController::class, 'destroy']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/api/events', [EventController::class, 'customerEvents']);
    Route::post('/events', [EventController::class, 'store']);
    Route::put('/events/{id}', [EventController::class, 'update']); 

    //logout apis
    Route::post('/admin/logout', [AdminAuthController::class, 'apiLogout'])->name('admin.apiLogout');
    Route::post('/logout', [AuthController::class, 'logout']);


});







