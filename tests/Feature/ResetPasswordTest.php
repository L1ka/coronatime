<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private $token;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->token = app('auth.password.broker')->createToken($this->user);
    }

    public function test_request_new_password_page_is_accessible_for_guest(): void
    {
        $response = $this->get( route('password.request'));

        $response->assertSuccessful();
    }

    public function test_request_new_password_page_is_not_accessible_for_authorized_user(): void
    {
        $response = $this->actingAs($this->user)->get( route('password.request'));

        $response->assertRedirect( route('login') );
    }

    public function test_if_provided_email_is_incorrect_request_new_password_page_gives_error(): void
    {
        $response = $this->post(route('password.email'), [
            'email' => 'likuna@gmail.com',
        ]);

        $response->assertSessionHasErrors(
            [
                'email' => "We can't find a user with that email address."
            ]
        );
    }

    public function test_if_provided_email_is_correct_success_page_should_be_displayed(): void
    {
        $user = User::factory()->create();
        $response = $this->post(route('password.email'), [
            'email' => $user->email,
        ]);

        $response->assertRedirect(route('email-sent'));
    }

    public function test_show_password_reset_page(): void
    {


        $response = $this->get(route('password.reset', ['token' => $this->token, 'email' => $this->user->email]));

        $response->assertViewIs('reset-password');
    }


    public function test_if_new_password_does_not_match_confirmation_password_update_page_gives_error(): void
    {


        $response = $this->post(route('password.update', [
            'token' => $this->token,
            'email' => $this->user->email,
            'password' => 'pass',
            'password_confirmation' => 'pass1']));

        $response->assertSessionHasErrors(
            [
                'password' => "The password field confirmation does not match."
            ]
        );
    }

    public function test_if_password_filds_are_correct_update_password_and_redirect_user_to_success_page(): void
    {


        $response = $this->post(route('password.update', [
            'token' => $this->token,
            'email' => $this->user->email,
            'password' => 'pass',
            'password_confirmation' => 'pass']));

        $response->assertRedirect(route('password-success'));
    }
}
