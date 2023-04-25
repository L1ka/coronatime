<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_page_is_accessible(): void
    {
        $response = $this->get( route('register'));

        $response->assertSuccessful();
        $response->assertViewIs('register');
    }

    public function test_if_input_is_not_provided_register_gives_errors(): void
    {
        $response = $this->post( route('register.sign-up'));

        $response->assertSessionHasErrors(
            [
                'name',
                'email',
                'password',
                'password_confirmation'
            ]
        );
    }

    public function test_if_name_input_is_not_provided_register_gives_error(): void
    {
        $response = $this->post( route('register.sign-up', [
            'email' => 'l@gmail.com',
            'password' => 'pass',
            'password_confirmation' => 'pass'
    ]) );

        $response->assertSessionHasErrors(
            [
                'name',
            ]
        );

        $response->assertSessionDoesntHaveErrors(['email', 'password', 'password_confirmation']);
    }

    public function test_if_email_input_is_not_provided_register_gives_error(): void
    {
        $response = $this->post( route('register.sign-up', [
            'name' => 'lika',
            'password' => 'pass',
            'password_confirmation' => 'pass'
        ]));

        $response->assertSessionHasErrors(
            [
                'email',
            ]
        );

        $response->assertSessionDoesntHaveErrors(['name', 'password', 'password_confirmation']);
    }

    public function test_if_password_input_is_not_provided_register_gives_error(): void
    {
        $response = $this->post( route('register.sign-up', [
                'name' => 'lika',
                'email' => 'l@gmail.com',
                'password_confirmation' => 'pass'
        ]));

        $response->assertSessionHasErrors(
            [
                'password',
            ]
        );

        $response->assertSessionDoesntHaveErrors(['name', 'email']);
    }

    public function test_if_password_confirmation_input_is_not_provided_register_gives_error(): void
    {
        $response = $this->post( route('register.sign-up', [
                'name' => 'lika',
                'email' => 'l@gmail.com',
                'password' => 'pass'
        ]));

        $response->assertSessionHasErrors(
            [
                'password_confirmation',
            ]
        );

        $response->assertSessionDoesntHaveErrors(['name', 'email']);
    }

    public function test_if_name_input_is_already_taken_register_gives_error(): void
    {
        $this->post( route('register.sign-up', [
            'name' => 'lika',
            'email' => 'l@gmail.com',
            'password' => 'pass',
            'password_confirmation' => 'pass'
        ]));
        $response = $this->post('/register', [
                'name' => 'lika',
        ]);

        $response->assertSessionHasErrors(
            [
                'name',
            ]
        );
    }

    public function test_if_email_input_is_already_taken_register_gives_error(): void
    {
        $this->post( route('register.sign-up', [
            'name' => 'lika',
            'email' => 'l@gmail.com',
            'password' => 'pass',
            'password_confirmation' => 'pass'
        ]));
        $response = $this->post('/register', [
                'email' => 'l@gmail.com',
        ]);


        $response->assertSessionHasErrors(
            [
                'email',
            ]
        );
    }

    public function test_if_password_and_password_confirmation_does_not_match_register_gives_error(): void
    {
        $response = $this->post( route('register.sign-up', [
            'password' => 'pass',
            'password_confirmation' => 'pass2'
        ]));

        $response->assertSessionHasErrors(
            [
                'password',
                'password_confirmation'
            ]
        );
    }

    public function test_if_email_format_is_incorrect_register_gives_error(): void
    {
        $response = $this->post( route('register.sign-up', [
            'email' => 'lgmail.com',
        ]));

        $response->assertSessionHasErrors(
            [
                'email',
            ]
        );
    }

    public function test_if_name_input_symbols_are_less_than_three_register_gives_error(): void
    {
        $response = $this->post( route('register.sign-up', [
            'name' => 'li',
        ]));
        $response->assertSessionHasErrors(
            [
                'name',
            ]
        );
    }

    public function test_if_password_input_symbols_are_less_than_three_register_gives_error(): void
    {
        $response = $this->post( route('register.sign-up', [
            'password' => 'li',
        ]));

        $response->assertSessionHasErrors(
            [
                'password',
            ]
        );
    }

    public function test_after_successful_register_user_should_be_redirected_to_success_feedback_page(): void
    {
        $response = $this->post( route('register.sign-up', [
            'name' => 'likuna',
            'email' => 'likuna@gmail.com',
            "password" => 'pass',
            'password_confirmation' => 'pass',
        ]));

        $response->assertRedirect(route('email-sent') );
    }
}
