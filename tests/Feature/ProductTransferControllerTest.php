<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductTransfer;
use App\Models\Team;
use App\Models\User;
use App\Models\History;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTransferControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['role' => 'admin']);
        $this->actingAs($this->user);
    }

    public function test_index_returns_correct_view()
    {
        $response = $this->get(route('product-transfers.index'));
        $response->assertStatus(200);
        $response->assertViewIs('page.transaction.transfer');
        $response->assertViewHas(['teams', 'title', 'transfers']);
    }

    public function test_search_returns_products_for_team()
    {
        $team = Team::factory()->create();
        $product = Product::factory()->create(['team_id' => $team->id]);

        $response = $this->get(route('product-transfers.search', [
            'q' => $product->product_name,
            'team_id' => $team->id
        ]));

        $response->assertStatus(200);
        $response->assertJson([[
            'id' => $product->id,
            'text' => $product->product_code . ' - ' . $product->product_name,
            'product_code' => $product->product_code,
            'product_name' => $product->product_name,
            'status' => $product->status
        ]]);
    }

    public function test_transfer_creates_transfer_and_updates_product()
    {
        $sourceTeam = Team::factory()->create();
        $destinationTeam = Team::factory()->create();
        $product = Product::factory()->create(['team_id' => $sourceTeam->id]);

        $response = $this->post(route('product-transfers.transfer'), [
            'source_team' => $sourceTeam->id,
            'destination_team' => $destinationTeam->id,
            'product_ids' => [$product->id]
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Check transfer was created
        $this->assertDatabaseHas('product_transfers', [
            'product_id' => $product->id,
            'source_team_id' => $sourceTeam->id,
            'destination_team_id' => $destinationTeam->id
        ]);

        // Check product was updated
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'team_id' => $destinationTeam->id
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'transfer_product'
        ]);
    }

    public function test_transfer_fails_if_product_not_in_source_team()
    {
        $sourceTeam = Team::factory()->create();
        $destinationTeam = Team::factory()->create();
        $product = Product::factory()->create(['team_id' => $destinationTeam->id]);

        $response = $this->post(route('product-transfers.transfer'), [
            'source_team' => $sourceTeam->id,
            'destination_team' => $destinationTeam->id,
            'product_ids' => [$product->id]
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');
    }

    public function test_store_creates_transfer_with_quantity()
    {
        $sourceTeam = Team::factory()->create();
        $destinationTeam = Team::factory()->create();
        $product = Product::factory()->create([
            'team_id' => $sourceTeam->id,
            'quantity' => 5
        ]);

        $response = $this->post(route('product-transfers.store'), [
            'product_id' => $product->id,
            'from_team_id' => $sourceTeam->id,
            'to_team_id' => $destinationTeam->id,
            'quantity' => 2,
            'transfer_date' => now(),
            'notes' => 'Test transfer'
        ]);

        $response->assertRedirect(route('product-transfers.index'));
        $response->assertSessionHas('success');

        // Check transfer was created
        $this->assertDatabaseHas('product_transfers', [
            'product_id' => $product->id,
            'from_team_id' => $sourceTeam->id,
            'to_team_id' => $destinationTeam->id,
            'quantity' => 2
        ]);

        // Check source product quantity was reduced
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'quantity' => 3
        ]);

        // Check new product was created for destination team
        $this->assertDatabaseHas('products', [
            'team_id' => $destinationTeam->id,
            'quantity' => 2
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'transfer_product'
        ]);
    }

    public function test_update_modifies_transfer()
    {
        $transfer = ProductTransfer::factory()->create();
        $oldQuantity = $transfer->quantity;

        $response = $this->put(route('product-transfers.update', $transfer), [
            'product_id' => $transfer->product_id,
            'from_team_id' => $transfer->from_team_id,
            'to_team_id' => $transfer->to_team_id,
            'quantity' => $oldQuantity + 1,
            'transfer_date' => now(),
            'notes' => 'Updated transfer'
        ]);

        $response->assertRedirect(route('product-transfers.index'));
        $response->assertSessionHas('success');

        // Check transfer was updated
        $this->assertDatabaseHas('product_transfers', [
            'id' => $transfer->id,
            'quantity' => $oldQuantity + 1
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'update_transfer'
        ]);
    }

    public function test_destroy_deletes_transfer()
    {
        $transfer = ProductTransfer::factory()->create();

        $response = $this->delete(route('product-transfers.destroy', $transfer));

        $response->assertRedirect(route('product-transfers.index'));
        $response->assertSessionHas('success');

        // Check transfer was deleted
        $this->assertDatabaseMissing('product_transfers', [
            'id' => $transfer->id
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'delete_transfer'
        ]);
    }
}
