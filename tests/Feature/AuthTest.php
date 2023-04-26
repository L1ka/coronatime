<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    public function test_login_page_is_accessible(): void
    {
        $response = $this->get( route('login'));

        $response->assertSuccessful();
        $response->assertViewIs('login');
    }

    public function test_if_input_is_not_provided_login_gives_errors(): void
    {
        $response = $this->post( route('login.sign-in'));
        $response->assertSessionHasErrors(
            [
                'name',
                'password',
            ]
        );
    }

    public function test_if_name_input_is_not_provided_login_gives_error(): void
    {
        $response = $this->post( route('login.sign-in', [
            'password' => 'pass',
        ]));

        $response->assertSessionHasErrors(
            [
                'name',
            ]
        );
    }


    public function test_if_password_input_is_not_provided_login_gives_error(): void
    {
        $response = $this->post( route('login.sign-in', [
            'name' => 'lika',
        ]));

        $response->assertSessionHasErrors(
            [
                'password',
            ]
        );
    }


    public function test_if_credentials_are_incorrect_login_gives_error(): void
    {
        $response = $this->post( route('login.sign-in', [
            'name' => 'lika',
            'password' => 'pass'
        ]));

        $response->assertSessionHasErrors(
            [
                'name' => 'Your provided credentials could not be verified.',
            ]
        );
    }

    public function test_if_user_is_not_verified_login_gives_error(): void
    {
        User::factory()->create([
            'name' => 'likuna',
            'email' => 'likuna@gmail.com',
            "password" => 'pass',
            'email_verified_at' => null
        ]);

        $response = $this->post( route('login.sign-in', [
            'name' => 'likuna',
            'password' => 'pass',
        ]));

        $response->assertSessionHasErrors(
            [
                'name' => 'Please verify your email to continue',
            ]
        );
    }

    public function test_after_successful_authorization_with_name_user_should_be_redirected_to_worldwide_dashboard_page(): void
    {
        User::factory()->create([
            'name' => 'likuna',
            'email' => 'likuna@gmail.com',
            "password" => 'pass',
        ]);

        $response = $this->post( route('login.sign-in', [
            'name' => 'likuna',
            "password" => 'pass',
        ]));

        $response->assertRedirect(route('home') );
    }

    public function test_after_successful_authorization_with_email_user_should_be_redirected_to_worldwide_dashboard_page(): void
    {
        User::factory()->create([
            'name' => 'likuna',
            'email' => 'likuna@gmail.com',
            "password" => 'pass',
        ]);

        $response = $this->post( route('login.sign-in', [
            'name' => 'likuna@gmail.com',
            "password" => 'pass',
        ]));

        $response->assertRedirect(route('home') );
    }
}
