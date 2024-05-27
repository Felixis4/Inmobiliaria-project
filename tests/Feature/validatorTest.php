<?php

namespace Tests\Feature;

use App\Models\House;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;


class validatorTest extends TestCase
{
    use RefreshDatabase;
    public function test_House_Request_validator_required_section(): void
    {
        $house = $this->CreateHouse();
        $response = $this->put('house/'.$house->id,[
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
        $house = $this->CreateHouse();
                
        $response = $this->put('house/'.$house->id,[
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

    private function CreateHouse(): mixed
    {
        $house = House::factory()->create();
        return $house;
    }
}