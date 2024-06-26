<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'covered_area' => $this->covered_area,
            'total_area' => $this->total_area,
            'rooms_number' => $this->rooms_number,
            'city_id' => $this->property->city_id,
            'type' => $this->property->type,
            'light' => $this->property->light,
            'natural_gas' => $this->property->natural_gas,
            'phone' => $this->property->phone,
            'water' => $this->property->water,
            'sewers' => $this->property->sewers,
            'internet' => $this->property->internet,
            'asphalt' => $this->property->asphalt,
        ];
    }
}
