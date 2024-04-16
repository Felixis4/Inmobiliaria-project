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

    public function store(PropertyRequest $request): RedirectResponse
    {
        if ($request->input('type') === 'house') {
            return redirect()->route($request->validated(['type']).'.create',['city_id'=> $request->validated(['city_id'])]);
        }
            return back()->withError('Tipo de propiedad no soportado.');
    }
}

