<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Property;
use App\Models\Feature;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\HouseRequest;
use App\Http\Requests\HouseUpdateRequest;


class HouseController extends Controller
{
    public function index(): View
    {
        $houses = House::all();
        return view('house.houses', compact('houses'));
    }

    public function create(): View
    {
        $features = Feature::all();
        return view('house.create', compact('features'));
    }

    public function store(HouseRequest $request): RedirectResponse
    {

        $house = House::create($request->validated());
        

        if ($request->has('features')) {
            $house->features()->attach($request->features);
        }

        $property = new Property([
            'property_id' => $house->id,
            'type' => House::class,
            'city_id' => $request->validated(['city_id']),
            'description' => $house->description,

        ]);
        $property->save();

        return redirect()->route('house.index')->with('success', 'House published successfully!');
    }

    public function show(House $house): View
    {
        $house = $house->load('features');
        return view('house.show', compact('house'));
    }

    public function edit(House $house): View
    {
        $features = Feature::all();
        return view('house.edit', compact('house','features'));
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
            $property->save();
        }

        if ($request->has('features')) {
            $house->features()->sync($request->features);
        } else {
            $house->features()->detach();  // Detach all features if none are provided
        }

        return redirect()->route('house.index')->with('success', 'House updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $house = House::findOrFail($id);

        $property = $house->property;
        if ($property) {
            $property->delete();
        }

        $house->delete();

        return redirect()->route('house.index')->with('success', 'House and associated property deleted successfully!');
    }
}
