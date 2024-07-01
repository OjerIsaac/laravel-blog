<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_add_comment_to_post()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('comments.store', $post), [
            'body' => 'This is a test comment.',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('comments', [
            'body' => 'This is a test comment.',
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);
    }
}
