<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdatePasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_has_to_change_password(): void
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create(['is_admin' => 'true', 'must_change_password' => true]);
        $response = $this->actingAs($user)->get('/api/admin-logs');

        $response->assertStatus(403);
    }

    public function test_admin_can_update_password(): void
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create([
            'is_admin' => 'true',
            'must_change_password' => true,
            'password' => Hash::make('password'),
        ]);

        $newPassword = 'password123';
        $data = [
            'oldPassword' => 'password',
            'newPassword' => $newPassword,
            'newPasswordConfirmation' => $newPassword,
        ];

        $response = $this->actingAs($user)->post('/api/password-update', $data);
        $response->assertStatus(200);

        /** @var User $user */
        $user->refresh();
        $this->assertTrue(Hash::check($newPassword, $user->password));
        $this->assertFalse($user->must_change_password);
    }
}
