<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductTransfer;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTransferFactory extends Factory
{
    protected $model = ProductTransfer::class;

    public function definition()
    {
        $sourceTeam = Team::factory()->create();
        $destinationTeam = Team::factory()->create();
        $product = Product::factory()->create(['team_id' => $sourceTeam->id]);

        return [
            'product_id' => $product->id,
            'source_team_id' => $sourceTeam->id,
            'destination_team_id' => $destinationTeam->id,
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => 'completed',
            'transferred_by' => $this->faker->numberBetween(1, 10),
            'transfer_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'notes' => $this->faker->sentence
        ];
    }
}
