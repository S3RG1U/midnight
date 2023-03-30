<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use withFaker, RefreshDatabase;

    /** @test */

    public function a_user_can_create_a_post()
    {
        $attributes = [
            'user_id' => '1',
            'title' => $this->faker->title,
            'content' => $this->faker->paragraph
        ];

        $this->actingAs(User::factory()->create());

       $this->post('/posts/store', $attributes);

       $this->assertDatabaseHas('posts', $attributes);

       $this->get('/posts')->assertSee($attributes['title']);
    }

    /** @test */

    public function only_authenticated_users_can_create_posts()
    {
        $attributes = [
            'user_id' => '1',
            'title' => $this->faker->title,
            'content' => $this->faker->paragraph
        ];

        $this->post('/posts/store', $attributes)->assertRedirect('login');
    }
}
