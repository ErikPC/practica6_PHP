<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Post;

class PostControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_get_all_posts()
    {
        $posts = Post::factory()->count(3)->create();
        $response = $this->get('/api/posts');
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonCount(3);
        $response->assertJsonFragment([
            'title' => $posts[0]->title,
            'body' => $posts[0]->body
        ]);
    }

    public function test_create_post()
    {
        $postData = [
            'title' => 'New Post',
            'body' => 'This is a new post.'
        ];
        $response = $this->post('/api/posts', $postData);
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('posts', $postData);
    }

    public function test_get_single_post()
    {
        $post = Post::factory()->create();
        $response = $this->get('/api/posts/' . $post->id);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'title' => $post->title,
            'body' => $post->body
        ]);
    }

    public function test_update_post()
    {
        $post = Post::factory()->create();
        $postData = [
            'title' => 'Updated Post',
            'body' => 'This is an updated post.'
        ];
        $response = $this->put('/api/posts/' . $post->id, $postData);
        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('posts', $postData);
    }

    public function test_delete_post()
    {
        $post = Post::factory()->create();
        $response = $this->delete('/api/posts/' . $post->id);
        $response->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
