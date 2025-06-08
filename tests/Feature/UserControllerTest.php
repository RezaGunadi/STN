<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\History;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class UserControllerTest extends TestCase
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
        $response = $this->get(route('users.index'));
        $response->assertStatus(200);
        $response->assertViewIs('users.index');
        $response->assertViewHas('users');
    }

    public function test_create_returns_correct_view()
    {
        $response = $this->get(route('users.create'));
        $response->assertStatus(200);
        $response->assertViewIs('users.create');
    }

    public function test_store_creates_user()
    {
        $response = $this->post(route('users.store'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'user'
        ]);

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success');

        // Check user was created
        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'user'
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'create_user'
        ]);
    }

    public function test_show_returns_correct_view()
    {
        $testUser = User::factory()->create();

        $response = $this->get(route('users.show', $testUser));
        $response->assertStatus(200);
        $response->assertViewIs('users.show');
        $response->assertViewHas('user', $testUser);
    }

    public function test_edit_returns_correct_view()
    {
        $testUser = User::factory()->create();

        $response = $this->get(route('users.edit', $testUser));
        $response->assertStatus(200);
        $response->assertViewIs('users.edit');
        $response->assertViewHas('user', $testUser);
    }

    public function test_update_modifies_user()
    {
        $testUser = User::factory()->create(['role' => 'user']);
        $oldRole = $testUser->role;

        $response = $this->put(route('users.update', $testUser), [
            'name' => 'Updated User',
            'email' => 'updated@example.com',
            'role' => 'manager'
        ]);

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success');

        // Check user was updated
        $this->assertDatabaseHas('users', [
            'id' => $testUser->id,
            'name' => 'Updated User',
            'email' => 'updated@example.com',
            'role' => 'manager'
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'update_user',
            'data' => json_encode([
                'user_id' => $testUser->id,
                'name' => 'Updated User',
                'old_role' => $oldRole,
                'new_role' => 'manager'
            ])
        ]);
    }

    public function test_destroy_deletes_user()
    {
        $testUser = User::factory()->create();

        $response = $this->delete(route('users.destroy', $testUser));

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success');

        // Check user was deleted
        $this->assertDatabaseMissing('users', [
            'id' => $testUser->id
        ]);

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'delete_user'
        ]);
    }

    public function test_changePassword_updates_password()
    {
        $testUser = User::factory()->create();

        $response = $this->post(route('users.changePassword', $testUser), [
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123'
        ]);

        $response->assertRedirect(route('users.index'));
        $response->assertSessionHas('success');

        // Check password was updated
        $this->assertTrue(Hash::check('newpassword123', $testUser->fresh()->password));

        // Check history was created
        $this->assertDatabaseHas('histories', [
            'user_id' => $this->user->id,
            'action' => 'change_password'
        ]);
    }
} 