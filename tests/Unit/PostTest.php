<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_create_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('posts.store'), [
            '_token' => csrf_token(), 
            'title' => 'Test Post',
            'body' => 'This is a test post body.',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
            'body' => 'This is a test post body.',
            'user_id' => $user->id,
        ]);
    }
}
