<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'product_code' => $this->faker->unique()->bothify('PRD-####'),
            'product_name' => $this->faker->words(3, true),
            'team_id' => Team::factory(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['Available', 'Unavailable']),
            'is_available' => $this->faker->boolean,
            'is_consumable' => $this->faker->boolean
        ];
    }
}
