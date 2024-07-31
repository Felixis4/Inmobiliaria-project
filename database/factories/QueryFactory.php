<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Query>
 */
class QueryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $property = Property::factory()->create();
        
        return [
            'property_id' => $property->id,
            'name' => fake()->name(),
            'subject' => fake()->name(),
            'email' => fake()->email(),
            'query' => Str::random(50),
        ];
    }
}
