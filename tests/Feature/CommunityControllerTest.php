<?php

use App\Models\Community;




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
    $this->withoutMiddleware();

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
    $this->withoutMiddleware();

    $community = Community::factory()->create();
    $response = $this->put("/api/communities/{$community->id}", [
        'title' => 'test'
    ]);

    $response->assertStatus(200);
});

test('delete community', function () {
    $this->withoutMiddleware();

    $community = Community::factory()->create();
    $response = $this->delete("/api/communities/{$community->id}");

    $response->assertStatus(204);
});

test("error object when comunidad not found", function () {
    $this->withoutMiddleware();

    $response = $this->get("/api/communities/999");

    $response->assertStatus(404);
});
