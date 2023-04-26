<?php

namespace Tests\Feature;

use App\Models\Stat;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryTest extends TestCase
{

    use RefreshDatabase;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user =User::factory()->create([
            'name' => 'likuna',
            'email' => 'likuna@gmail.com',
            "password" => 'pass',
        ]);
    }

    public function test_by_country_page_is_not_accessible_for_guest(): void
    {
        $response = $this->get( route('dashboard-country.countries'));

        $response->assertRedirect( route('login') );
    }

    public function test_by_country_page_is_accessible_for_authorized_user(): void
    {
        $response = $this->actingAs($this->user)->get( route('dashboard-country.countries'));

        $response->assertSuccessful();
    }

    public function test_search_works_properly_on_by_country_page(): void
    {
        Stat::factory()->create([
            'name' => [
                'en' => 'the keyword geo exists here',
                'ka' => 'the keyword geo exists here ka'
            ]
        ]);
        Stat::factory()->create([
            'name' => [
                'en' => 'the keyword does not exists here',
                'ka' => 'the keyword does not exists here ka'
            ]
        ]);

        $response = $this->actingAs($this->user)->get(route('dashboard-country.countries', ['search' => 'geo']));


        $response->assertStatus(200);
        $response->assertSee('the keyword geo exists here');
        $response->assertDontSee('the keyword does not exists here');
    }

    public function test_by_country_sort_function_returns_country_view(): void
    {
        $response = $this->actingAs($this->user)->post( route('dashboard-country.sort', ['sort' => 'asc', 'name' => 'recover']));

        $response->assertViewIs('dashboard-country');
    }

}
