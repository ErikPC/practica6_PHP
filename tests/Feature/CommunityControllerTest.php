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
