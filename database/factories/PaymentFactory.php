<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Payment;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'total_amount' => $this->faker->randomFloat(2, 10, 100),
            'payment_method' => $this->faker->randomElement(['card', 'paypal', 'cash']),
            'payment_status' => $this->faker->randomElement(['pending', 'paid', 'failed']),
            'payment_date' => now(),
            'card_number' => $this->faker->creditCardNumber(),
            'card_holdername' => $this->faker->name(),
            'cvv' => $this->faker->randomNumber(3),
        ];
    }
}
