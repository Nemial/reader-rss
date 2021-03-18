<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MainTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->make();
    }

    public function testBasicTest()
    {
        $response = $this->actingAs($this->user)->get('/');

        $response->assertStatus(200);
    }
}
