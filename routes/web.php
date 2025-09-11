<?php

use App\Models\Bouquet;
use App\Models\AddOn;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\Admin;

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    // Load bouquet with related data
    $bouquet = Bouquet::with([
        'addOns',         // belongsToMany relationship to AddOn
        'admin',          // belongsTo relationship to Admin
        'category',       // belongsTo relationship to Category
    ])->find(8);

    // Return the bouquet with its relations or a message if not found
    return $bouquet ?? response()->json(['message' => 'Bouquet not found'], 404);
});

