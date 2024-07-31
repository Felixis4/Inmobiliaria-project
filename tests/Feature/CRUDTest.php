<?php

namespace Tests\Feature;

use App\Models\House;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

//  entra al index, crear propiedad lo redirige a elegir tipo propiedad y ciudad
//  al elegirlo lo redirecciona a crear propiedad según el tipo de propiedad
//  lo redirecciona a lista de propiedades del mismo tipo
class CRUDTest extends TestCase
{
    use RefreshDatabase;

    //CRUD houses
    public function test_create_house()
    {
        $house = $this->CreateHouse();
        $this->assertDatabaseHas('houses',$house->toArray());

    }
    public function test_read_house()
    {
        $house = $this->Createhouse();

        $this->assertDatabaseHas('houses',$house->toArray());
    }
    public function test_update_house()
    {
        $house = $this->Createhouse();

        $houseUpdate = House::find($house->id)->update([
            'title' => 'houseee',
            'description' => 'laskdjalskdfjaslkdfjasldf',
        ]);

        $house = House::find($house->id);
        
        $this->assertDatabaseHas('houses',$house->toArray());
    }
    public function test_destroy_house()
    {
        $house = $this->Createhouse();

        $houseDelete = House::find($house->id)->delete();

        $this->assertDatabaseMissing('houses', $house->toArray());
    }
    //CRUD property
    public function test_create_property()
    {
        $property = $this->CreateProperty();

        $this->assertDatabaseHas('properties',$property->toArray());
    }
    public function test_read_property()
    {
        $property = $this->CreateProperty();

        $this->assertDatabaseHas('properties',$property->toArray());
    }
    public function test_update_property()
    {
        $property = $this->CreateProperty();

        $propertyUpdate = Property::find($property->id)->update([
            'title' => 'houseee',
            'description' => 'laskdjalskdfjaslkdfjasldf',
        ]);

        $property = Property::find($property->id);

        $this->assertDatabaseHas('properties',$property->toArray());
    }
    public function test_destroy_property()
    {
        $property = $this->CreateProperty();

        $propertyDelete = $property->delete();

        $this->assertDatabaseMissing('properties',$property->toArray());
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
