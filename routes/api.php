<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController,
    BouquetController,
    CustomerController,
    CategoryController,
    OrderController,
    AddOnController,
    PaymentController,
    ShipmentController,
    OrderItemController,
    UserController,
    AuthController
};

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('users', UserController::class)->only(['index','show']);
    Route::apiResource('admins', AdminController::class);
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('add-ons', AddOnController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('order-items', OrderItemController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('shipments', ShipmentController::class);

    Route::apiResource('bouquets', BouquetController::class);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


use App\Http\Controllers\AdminAuthController;

Route::post('/admin/login', [AdminAuthController::class, 'apiLogin']);

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->get('/admin/dashboard', function () {
    return response()->json(['message' => 'Admin dashboard API']);
});

