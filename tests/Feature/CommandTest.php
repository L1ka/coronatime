<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommandTest extends TestCase
{
    use RefreshDatabase;
    public function test_countries_generated_successfuly(): void
    {
        $this->artisan('generate:countries')->expectsOutput('Countries generated successfully');
    }
}
