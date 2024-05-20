<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\City;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PropertyController extends Controller
{
    public function create(): View
    {
        $cities = City::all();
        $types = ['house' => 'House', 'department' => 'Department'];
        
        return view('properties_selector', compact('cities', 'types'));
    }

    public function redirector(PropertyRequest $request): RedirectResponse
    {
        return redirect()->route($request->validated(['type']).'.create',['city_id'=> $request->validated(['city_id'])]);
    }

    public function store($property)
    {
        $property->save();
    }

    public function update($property)
    {
        $property->save();
    }            
}

