<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bouquet>
 */
class BouquetFactory extends Factory
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
            'price'=>$this->faker->randomFloat(2, 10, 100),
            'image'=>$this->faker->imageUrl(),
            'description'=>$this->faker->sentence(),
            'stock_quantity'=>$this->faker->numberBetween(1, 50),
            'admin_id'=>Admin::factory(),
            'category_id'=>Category::factory(),
        ];
    }
}
