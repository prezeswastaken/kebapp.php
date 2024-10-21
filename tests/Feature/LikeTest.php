<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Kebab;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LikeTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_like_kebab(): void
    {
        $this->assertNotNull(Kebab::find(1));
        $user = User::factory()->create();
        /** @var Authenticatable $user */
        $response = $this->actingAs($user)->post('api/like/kebab/1');
        $response->assertStatus(200);
        $this->assertNotNull($user->likes->where('id', 1)->first());
    }

    public function test_user_can_remove_like_of_kebab(): void
    {
        $this->assertNotNull(Kebab::find(1));
        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('api/like/kebab/1');
        $response = $this->actingAs($user)->post('api/like/kebab/1');
        $response->assertStatus(200);
        $this->assertNull($user->likes->where('id', 1)->first());
    }
}
