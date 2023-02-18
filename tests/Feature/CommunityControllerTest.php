<?php

use App\Models\Community;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



test('all Communities', function () {
    $response = $this->get('/api/communities');

    $response->assertStatus(200);
    $response->assertJsonStructure([
        '*' => [
            'id',
            'title',
            'created_at',
            'updated_at'
        ]
    ]);
});

test("get One community", function () {
    $community = Community::factory()->create();
    $response = $this->get("/api/communities/{$community->id}");

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'id',
        'title',
        'created_at',
        'updated_at'
    ]);
});

test('create community', function () {
    $response = $this->post('/api/communities', [
        'title' => 'test'
    ]);

    $response->assertStatus(201);
    $response->assertJsonStructure([
        'id',
        'title',
        'created_at',
        'updated_at'
    ]);
});

test('update community', function () {
    $community = Community::factory()->create();
    $response = $this->put("/api/communities/{$community->id}", [
        'title' => 'test'
    ]);

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'id',
        'title',
        'created_at',
        'updated_at'
    ]);
});

test('delete community', function () {
    $community = Community::factory()->create();
    $response = $this->delete("/api/communities/{$community->id}");

    $response->assertStatus(204);
});

test("error object when comunidad not found", function () {
    $response = $this->get("/api/communities/999");

    $response->assertStatus(404);
});
