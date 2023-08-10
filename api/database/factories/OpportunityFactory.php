<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "uuid" => fake()->uuid(),
            "name" => fake()->word(),
            "value" => fake()->numberBetween(30000, 250000),
            "client_identify" => Client::all()->random(1)->first()->uuid,
            "user_identify" => User::all()->random(1)->first()->uuid,
        ];
    }
}
