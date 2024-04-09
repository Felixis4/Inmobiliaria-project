<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class HouseController extends Controller
{

    public function index(): View
    {
        $houses = House::all();
        return view('houses', compact('houses'));
    }

    public function create(): View
    {
        return view('house');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'total_area' => 'required|numeric',
            'covered_area' => 'required|numeric',
            'rooms_number' => 'required|integer',
            'city_id' => 'required'
        ]);

        $house = new House();
        $house->title = $validated['title'];
        $house->description = $validated['description'];
        $house->price = $validated['price'];
        $house->total_area = $validated['total_area'];
        $house->covered_area = $validated['covered_area'];
        $house->rooms_number = $validated['rooms_number'];
        $house->save();

        $property = new Property([
            'property_id' => $house->id,
            'type' => 'house',
            'city_id' => $validated['city_id'],
            'description' => $house->description,
        
        ]);
        $property->save();

        return redirect()->route('house.index')->with('success', 'House published successfully!');
    }

    public function show(House $house): View
    {
        return view('house_show', compact('house'));
    }

    public function edit(House $house): View
    {
        return view('house_edit', compact('house'));
    }

    public function update(Request $request, House $house): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'total_area' => 'required|numeric',
            'covered_area' => 'required|numeric',
            'rooms_number' => 'required|integer',
        ]);


        $house->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'total_area' => $validated['total_area'],
            'covered_area' => $validated['covered_area'],
            'rooms_number' => $validated['rooms_number'],
        ]);


        $property = Property::where('house_id', $house->id)->first();
        if ($property) {
            $property->description = $house->description;
            $property->save();
        }

        return redirect()->route('house.index')->with('success', 'House updated successfully!');
    }

    public function destroy(House $house): RedirectResponse
    {
        $property = Property::where('house_id', $house->id)->first();
        if ($property) {
            $property->delete();
        }
        $house->delete();

        return redirect()->route('house.index')->with('success', 'House and associated property deleted successfully!');
    }
}
