<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Kebab;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_user_can_comment_kebab(): void
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();

        $text = $this->faker()->text();
        $response = $this->actingAs($user)->post('/api/comment/kebab/1', ['text' => $text]);
        $response->assertStatus(200);
        $this->assertNotNull(Kebab::find(1)->comments->where('user_id', $user->id)->first());
        /** @var User $user */
        $user->refresh();
        $this->assertNotNull($user->comments->where('kebab_id', 1)->first());
    }
}
