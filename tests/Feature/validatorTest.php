<?php

namespace Tests\Feature;

use App\Models\House;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class validatorTest extends TestCase
{
    use RefreshDatabase;
    public function test_House_Request_validator_required_section(): void
    {
        $response = $this->post('house',[
            'title'=> '',
            'description'=> '',
            'price'=> '',
            'total_area'=> '',
            'covered_area'=> '',
            'rooms_number'=> '',
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title','description','price','total_area','covered_area','rooms_number']);
    }
    public function test_House_Request_validator_character_section(): void
    {
                
        $response = $this->post('house',[
            'title'=> 'string or numeric works',
            'description'=> 123,
            'price'=> 'numeric',
            'total_area'=> 'numeric',
            'covered_area'=> 'numeric',
            'rooms_number'=> 'numeric',
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description','price','total_area','covered_area','rooms_number']);
    }
    public function test_Property_Request_validator_required_section(): void
    {
        $property = $this->CreateProperty();
        $response = $this->put('properties',[
            'property_id' => '',
            'type' => '',
            'city_id' => '', 
            'description' => '',
            'light' => '',
            'natural_gas' => '',
            'phone' => '',
            'water' => '',
            'sewers' => '',
            'internet' => '',
            'asphalt' => '',
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['property_id','type','city_id','description','light','natural_gas','phone','water','sewers','internet','asphalt']);
    }

    private function CreateHouse(): mixed
    {
        $house = House::factory()->create();
        return $house;
    }
    private function CreateProperty(): mixed
    {
        $property = Property::factory()->create();
        return $property;
    }
}