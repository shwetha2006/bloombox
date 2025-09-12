<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Bouquet;
use App\Models\AddOn;
use App\Models\OrderItem;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_item>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'=>Order::factory(),
            'bouquet_id'=>Bouquet::factory(),
            'add_on_id'=>AddOn::factory(),
            'parent_order_item_id'=>$this->faker->numberBetween(1, 5),
            'quantity'=>$this->faker->randomFloat(2, 10, 100),


        ];
    }
}
