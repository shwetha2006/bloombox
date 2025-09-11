<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Order;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id'=>Customer::factory(),
            'order_date'=>$this->faker->date(),
            'order_status'=>$this->faker->randomElement(['pending','completed','cancelled']),
            'total_cost'=>$this->faker->randomElement([2, 20, 500]),
        ];
    }
}
