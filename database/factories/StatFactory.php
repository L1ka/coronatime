<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stat>
 */
class StatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>  [
                'en' => fake()->text(10),
                'ka' => fake()->text(10)
            ],
            'new_case' => fake()->randomNumber,
            'recover' => fake()->randomNumber,
            'death' => fake()->randomNumber,
        ];
    }
}
