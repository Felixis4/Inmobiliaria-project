<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\propertyImages;
use App\Traits\Upload;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    use Upload;
    public function destroy($id){
        $image = propertyImages::findOrFail($id);
        $path = $image->path;
        Storage::delete('public/'.$path);
        Storage::delete('public/'.str_replace('webp',$image->mime_type, $path));
        $image->delete();

        return back()->with('success','Image Deleted');
    }
    public function edit($propertyId)
    {
        $images = Property::findOrFail($propertyId)->images;
        $id = Property::findOrFail($propertyId)->property_id;
        return view('images_edit', compact('images','id'));
    }
}
