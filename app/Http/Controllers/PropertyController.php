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
        ]);
        // Guardar datos del request en la sesión
        Session::put('propertyData', $request->except('_token'));
    
        // Redirigir al formulario correspondiente basado en el tipo de propiedad seleccionado
        $type = $request->input('type');
        if ($type === 'house') {
            return redirect()->route('house.create');
        } elseif ($type === 'department') {
            return redirect()->route('department.create');
        }
    
        // Añadir manejo para tipos de propiedad no soportados o error
        return back()->withError('Tipo de propiedad no soportado.');
    }
    

}

