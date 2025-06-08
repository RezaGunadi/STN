<?php

namespace Database\Factories;

use App\Models\Integration;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntegrationFactory extends Factory
{
    protected $model = Integration::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'type' => $this->faker->word,
            'status' => $this->faker->randomElement(['active', 'inactive', 'pending']),
            'config' => json_encode([
                'key' => $this->faker->word,
                'value' => $this->faker->word
            ]),
            'description' => $this->faker->sentence
        ];
    }
} 