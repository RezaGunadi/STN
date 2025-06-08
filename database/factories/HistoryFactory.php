<?php

namespace Database\Factories;

use App\Models\History;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoryFactory extends Factory
{
    protected $model = History::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'action' => $this->faker->randomElement([
                'create_user',
                'update_user',
                'delete_user',
                'transfer_product',
                'update_transfer',
                'delete_transfer',
                'create_integration',
                'update_integration',
                'delete_integration',
                'sync_integration'
            ]),
            'description' => $this->faker->sentence,
            'data' => json_encode([
                'key' => $this->faker->word,
                'value' => $this->faker->word
            ])
        ];
    }
}
