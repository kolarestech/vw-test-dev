<?php

namespace Database\Factories;

use App\Models\Opportunity;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OpportunityProduct>
 */
class OpportunityProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "opportunity_identify" => Opportunity::all()->random(1)->first()->uuid,
            "product_identify" => Product::all()->random(1)->first()->uuid,
        ];
    }
}
