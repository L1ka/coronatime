<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_logs_out_authorized_user(): void
    {
        $user = User::factory()->create([
            'name' => 'likuna',
            'email' => 'likuna@gmail.com',
            "password" => 'pass',
        ]);

        $response = $this->actingAs($user)->post( route('logout.perform'));

        $response->assertRedirect( route('login') );
        $this->assertGuest();
    }

}
