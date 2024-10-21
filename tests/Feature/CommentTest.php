<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Comment;
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

    public function test_user_can_delete_their_comment(): void
    {
        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $text = $this->faker()->text();
        $response = $this->actingAs($user)->post('/api/comment/kebab/1', ['text' => $text]);
        $response->assertStatus(200);
        $commentId = $response->json('id');

        $response = $this->actingAs($user)->delete("/api/comment/$commentId");
        $response->assertNoContent();
        $this->assertNull(Comment::find($commentId));
    }

    public function test_user_cant_delete_other_users_comment(): void
    {
        $otherUser = User::factory()->create();
        $otherUser->comments()->create(['text' => 'random comment text...', 'kebab_id' => 1]);
        $comment = $otherUser->comments->first();
        $commentId = $comment->id;

        /** @var Authenticatable $user */
        $user = User::factory()->create();
        $response = $this->actingAs($user)->delete("/api/comment/$commentId");

        $response->assertStatus(403);
        $this->assertDatabaseHas($comment);
    }
}
