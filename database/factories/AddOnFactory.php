<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AddOn;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AddOn>
 */
class AddOnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->word(),
            'price'=>$this->faker->randomFloat(2, 1, 20),
            'description'=>$this->faker->sentence(),
            'image'=>$this->faker->imageUrl(),
            'stock_quantity'=>$this->faker->numberBetween(1, 30),
        ];
    }
}
