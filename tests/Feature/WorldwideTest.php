<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WorldwideTest extends TestCase
{
    use RefreshDatabase;
    public function test_worldwide_page_is_not_accessible_for_guest(): void
    {
        $response = $this->get( route('home'));

        $response->assertRedirect( route('login') );
    }

    public function test_worldwide_page_is_accessible_for_authorized_user(): void
    {
        $user = User::factory()->create([
            'name' => 'likuna',
            'email' => 'likuna@gmail.com',
            "password" => 'pass',
        ]);

        $response = $this->actingAs($user)->get( route('home'));

        $response->assertViewIs('dashboard-worldwide');
    }
}
