<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\HouseRequest;
use App\Http\Requests\HouseUpdateRequest;
use App\Traits\Upload;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    use Upload;
    public function index(): View
    {
        $houses = House::all();
        return view('house.houses', compact('houses'));
    }

    public function create(): View
    {
        return view('house.create');
    }

    public function store(HouseRequest $request): RedirectResponse
    {
        $house = House::create($request->validated());

        $property = new Property([
            'property_id' => $house->id,
            'type' => House::class,
            'city_id' => $request->validated(['city_id']),
            'description' => $house->description,
            'light' => $request->validated(['light']),
            'natural_gas' => $request->validated(['natural_gas']),
            'phone' => $request->validated(['phone']),
            'water' => $request->validated(['water']),
            'sewers' => $request->validated(['sewers']),
            'internet' => $request->validated(['internet']),
            'asphalt' => $request->validated(['asphalt'])
        ]);

       if ($request->hasFile('images')){
        $images = $request->file('images');
        $propertyId = $property->property_id;
        $this->uploadfile($propertyId, $images);
       }

        app(PropertyController::class)->store($property);
        
        return redirect()->route('house.index')->with('success', 'House published successfully!');
    }

    public function show(House $house): View
    {
        $images = $house->property->images;
        return view('house.show', compact('house','images'));
    }

    public function edit(House $house): View
    {
        $property = $house->property;
        $images = $house->property->images;
        return view('house.edit', compact('house','property','images'));
    }

    public function update(HouseUpdateRequest $request, House $house): RedirectResponse
    {
        $house->update([
            'title' => $request->validated(['title']),
            'description' => $request->validated(['description']),
            'price' => $request->validated(['price']),
            'total_area' => $request->validated(['total_area']),
            'covered_area' => $request->validated(['covered_area']),
            'rooms_number' => $request->validated(['rooms_number']),
        ]);

        $property = $house->property;
        if ($property) {
            
            $property->description = $house->description;
            $property->light = $request->validated(['light']);
            $property->natural_gas = $request->validated(['natural_gas']);
            $property->phone = $request->validated(['phone']);
            $property->water = $request->validated(['water']);
            $property->sewers = $request->validated(['sewers']);
            $property->internet = $request->validated(['internet']);
            $property->asphalt = $request->validated(['asphalt']);
        }
        
        if ($request->hasFile('images')){
            $images = $request->file('images');
            $propertyId = $property->property_id;
            $this->uploadfile($propertyId, $images);
        }

        app(PropertyController::class)->update($property);
        
        return redirect()->route('house.index')->with('success', 'House updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $house = House::findOrFail($id);

        $property = $house->property;
        if ($property) {
            $propertyImages = $property->images;
            if ($propertyImages){
                foreach($propertyImages as $propertyImage){
                $directory = Storage::allFiles('public/images/'.$propertyImage->property_id);
                Storage::delete($directory);
                $propertyImage->delete();
                }
                $directoryPath = 'public/images/'.$property->property_id;
                Storage::deleteDirectory($directoryPath);
            }
            $property->delete();
        }

        $house->delete();

        return redirect()->route('house.index')->with('success', 'House and associated property deleted successfully!');
    }
}
