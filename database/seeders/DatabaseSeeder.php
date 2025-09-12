<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Bouquet;
use App\Models\AddOn;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Shipment;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Create 10 users
    $users = User::factory(10)->create();

    // Use the first user as the single Admin
    $adminUser = $users->first();
    $admin = Admin::factory()->create(['user_id' => $adminUser->id]);

    // Remaining users become customers
    $users->slice(1)->each(function ($user) {
        Customer::factory()->create(['user_id' => $user->id]);
    });

    // Create 5 categories
    $categories = Category::factory(5)->create();

    // Create 10 add-ons
    $addOns = AddOn::factory(10)->create();

    // Create 15 bouquets linked to the one admin and a category
    $bouquets = Bouquet::factory(15)->create()->each(function ($bouquet) use ($categories, $admin, $addOns) {
        $bouquet->category()->associate($categories->random())->save();
        $bouquet->admin()->associate($admin)->save();

        $bouquet->addOns()->attach(
            $addOns->random(rand(1, 3))->pluck('id')->toArray()
        );
    });

    // Create 10 orders
    $orders = Order::factory(10)->create()->each(function ($order) use ($bouquets, $addOns) {
        // Create 1–3 bouquet items
        $mainOrderItems = OrderItem::factory(rand(1, 3))->create([
            'order_id' => $order->id,
            'bouquet_id' => $bouquets->random()->id,
            'add_on_id' => null,
            'parent_order_item_id' => null,
        ]);

        // Add optional add-ons
        foreach ($mainOrderItems as $item) {
            if (rand(0, 1)) {
                OrderItem::factory(rand(1, 2))->create([
                    'order_id' => $order->id,
                    'bouquet_id' => null,
                    'add_on_id' => $addOns->random()->id,
                    'parent_order_item_id' => $item->id,
                ]);
            }
        }

        // Add payment
        Payment::factory()->create([
            'order_id' => $order->id
        ]);

        // Add shipment
        Shipment::factory()->create([
            'order_id' => $order->id
        ]);
    });
}

}
