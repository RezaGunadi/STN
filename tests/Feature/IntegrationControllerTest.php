<?php

namespace Tests\Feature;

use App\Models\Integration;
use App\Models\User;
use App\Models\History;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IntegrationControllerTest extends TestCase
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
        $response = $this->get(route('integrations.index'));
        $response->assertStatus(200);
        $response->assertViewIs('integrations.index');
        $response->assertViewHas('integrations');
    }

    public function test_create_returns_correct_view()
    {
        $response = $this->get(route('integrations.create'));
        $response->assertStatus(200);
        $response->assertViewIs('integrations.create');
    }

    public function test_store_creates_integration()
    {
        $response = $this->post(route('integrations.store'), [
            'name' => 'Test Integration',
            'type' => 'test_type',
            'status' => 'active',
            'config' => json_encode(['key' => 'value']),
            'description' => 'Test description'
        ]);

        $response->assertRedirect(route('integrations.index'));
        $response->assertSessionHas('success');

        // Check integration was created
        $this->assertDatabaseHas('integrations', [
            'name' => 'Test Integration',
            'type' => 'test_type',
            'status' => 'active'
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'create_integration'
        ]);
    }

    public function test_show_returns_correct_view()
    {
        $integration = Integration::factory()->create();

        $response = $this->get(route('integrations.show', $integration));
        $response->assertStatus(200);
        $response->assertViewIs('integrations.show');
        $response->assertViewHas('integration', $integration);
    }

    public function test_edit_returns_correct_view()
    {
        $integration = Integration::factory()->create();

        $response = $this->get(route('integrations.edit', $integration));
        $response->assertStatus(200);
        $response->assertViewIs('integrations.edit');
        $response->assertViewHas('integration', $integration);
    }

    public function test_update_modifies_integration()
    {
        $integration = Integration::factory()->create(['status' => 'active']);
        $oldStatus = $integration->status;

        $response = $this->put(route('integrations.update', $integration), [
            'name' => 'Updated Integration',
            'type' => $integration->type,
            'status' => 'inactive',
            'config' => json_encode(['key' => 'new_value']),
            'description' => 'Updated description'
        ]);

        $response->assertRedirect(route('integrations.index'));
        $response->assertSessionHas('success');

        // Check integration was updated
        $this->assertDatabaseHas('integrations', [
            'id' => $integration->id,
            'name' => 'Updated Integration',
            'status' => 'inactive'
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'update_integration',
            'data' => json_encode([
                'integration_id' => $integration->id,
                'name' => 'Updated Integration',
                'old_status' => $oldStatus,
                'new_status' => 'inactive'
            ])
        ]);
    }

    public function test_destroy_deletes_integration()
    {
        $integration = Integration::factory()->create();

        $response = $this->delete(route('integrations.destroy', $integration));

        $response->assertRedirect(route('integrations.index'));
        $response->assertSessionHas('success');

        // Check integration was deleted
        $this->assertDatabaseMissing('integrations', [
            'id' => $integration->id
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'delete_integration'
        ]);
    }

    public function test_sync_performs_sync_operation()
    {
        $integration = Integration::factory()->create();

        $response = $this->post(route('integrations.sync', $integration));

        $response->assertRedirect(route('integrations.index'));
        $response->assertSessionHas('success');

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'sync_integration'
        ]);
    }
}
