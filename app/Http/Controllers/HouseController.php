<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SaveUpdateRequest;
use App\Http\Requests\SaveRequest;
use App\Models\Property;

class HouseController extends Controller
{
    public function index(): View
    {
        $houses = House::all();
        return view('def.propertiesTable', compact('houses'));
    }

    public function create(): View
    {
        $page_title = 'House';
        $page_description = 'Some description for the page';

		$action = "create_house";

        return view('def.forms.house.create',compact('page_title', 'page_description','action'));
    }

    public function store(SaveRequest $request): RedirectResponse
    {
        // $proerty = Property::factory(20)->create();

        $house = House::create($request->validated());

        $request->merge([
            'property_id' => $house->id,
            'type' => House::class,
        ]);

        app(PropertyController::class)->store($request);
        
        return redirect()->route('properties')->with('success', 'House published successfully!');

    }

    public function show(House $house): View
    {
        $images = $house->property->images;
        return view('def.forms.house.show', compact('house','images'));
    }

    public function edit(House $house): View
    {
        $page_title = 'House';
        $page_description = 'Some description for the page';
		$action = "create_house";

        $property = $house->property;
        $images = $house->property->images;
        return view('def.forms.house.edit', compact('house','property','images','page_title','page_description','action'));
    }

    public function update(SaveUpdateRequest $request, House $house): RedirectResponse
    {
        $house->update($request->toArray());
        $property = $house->property;
        if ($property) {
            app(PropertyController::class)->update($request,$property);
        }
        
        return redirect()->route('properties')->with('success', 'House updated successfully!');
    }

    public function destroy($id): RedirectResponse
    {
        $house = House::findOrFail($id);

        $property = $house->property;
        if ($property) {
            app(PropertyController::class)->destroy($property);
        }

        $house->delete();

        return redirect()->route('properties')->with('success', 'House and associated property deleted successfully!');
    }
}
