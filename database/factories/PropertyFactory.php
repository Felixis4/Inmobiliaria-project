<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $house = House::factory()->create();
        $city = City::create(['name'=>'Villa Gral Belgrano']);

        return [
            'property_id' => $house->id,
            'type' => House::class,
            'city_id' => $city->id,
            'description' => $house->description,
            'light' => 0,
            'natural_gas' => 0,
            'phone' => 0,
            'water' => 1,
            'sewers' => 0,
            'internet' => 0,
            'asphalt' => 1,
        ];
    }
}
