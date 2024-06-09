<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_book()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'sanctum');

        $response = $this->postJson('/api/books', [
            'title' => 'Test Book',
            'author' => 'Test Author',
            'publisher' => 'Test Publisher',
            'first_publish_date' => '2020-01-01',
            'ifTranslator' => false,
            'description' => 'Test Description',
            'isbn' => '1234567890123',
            'pages' => 100,
            'ifChapters' => false,
            'cover' => 'testcover.jpg',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'title' => 'Test Book',
                 ]);
    }

    // Additional tests for index, show, update, and destroy methods
}
