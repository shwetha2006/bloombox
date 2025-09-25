<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AddOnController;
use App\Http\Controllers\BouquetController;

// --------------------
// Admin login / logout
// --------------------
Route::post('/admin/login', [AdminAuthController::class, 'apiLogin']);

// --------------------
// Protected routes with admin-only token auth
// --------------------

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('addons', [AddOnController::class, 'index'])->name('addons.index');
    Route::post('addons', [AddOnController::class, 'store'])->name('addons.store');
    Route::get('addons/{addon}', [AddOnController::class, 'show'])->name('addons.show');
    Route::put('addons/{addon}', [AddOnController::class, 'update'])->name('addons.update'); // Update add-on
    Route::delete('addons/{addon}', [AddOnController::class, 'destroy'])->name('addons.destroy');

    Route::get('bouquets', [BouquetController::class, 'index'])->name('bouquets.index');
    Route::post('bouquets', [BouquetController::class, 'store'])->name('bouquets.store');
    Route::get('bouquets/{bouquet}', [BouquetController::class, 'show'])->name('bouquets.show'); // <-- add this
    Route::delete('bouquets/{bouquet}', [BouquetController::class, 'destroy'])->name('bouquets.destroy'); // <-- add this
    Route::put('bouquets/{bouquet}', [BouquetController::class, 'update'])->name('bouquets.update');

    Route::post('/admin/logout', [AdminAuthController::class, 'apiLogout'])->name('admin.apiLogout');



});
