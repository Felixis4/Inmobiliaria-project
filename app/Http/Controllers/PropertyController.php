<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\City;
use App\Models\Property;
use App\Traits\Upload;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class PropertyController extends Controller
{
    use Upload;
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

    public function store($request)
    {
        $property = Property::create($request->toArray());

       if ($request->hasFile('images')){
        $images = $request->images;
        $propertyId = $property->property_id;
        $this->uploadfile($propertyId, $images);
       }
        $property->save();
    }

    public function update($request,$property)
    {
        if ($request->hasFile('images')){
            $images = $request->file('images');
            $propertyId = $property->property_id;
            $this->uploadfile($propertyId, $images);
        }

        $property->update($request->toArray());
    }    
    
    public function destroy($property)
    {  
        $propertyImages = $property->images;
        if ($propertyImages){
            foreach($propertyImages as $propertyImage){
            $directory = Storage::allFiles(config('app.PUBLIC_IMAGES_PATH').$propertyImage->property_id);
            Storage::delete($directory);
            $propertyImage->delete();
            }
            $directoryPath = config('app.PUBLIC_IMAGES_PATH').$property->property_id;
            Storage::deleteDirectory($directoryPath);
        }
        $property->delete();
    }
}

