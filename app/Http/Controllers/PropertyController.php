<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function create(): View
    {
        $cities = City::all();
        $types = ['house' => 'House', 'department' => 'Department']; // Aquí puedes agregar más tipos según tu modelo de datos
        
        return view('properties_selector', compact('cities', 'types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'city_id' => 'required|exists:cities,id',
            'type' => 'required',
        ]);
    
        if ($request->input('type') === 'house') {
            return redirect()->route($validated['type'].'.create',['city_id'=> $validated['city_id']]);
        }
            return back()->withError('Tipo de propiedad no soportado.');
    }
    

}

