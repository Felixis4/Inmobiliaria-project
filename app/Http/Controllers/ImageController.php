<?php

namespace App\Http\Controllers;

use App\Models\PropertyImage;
use App\Traits\Upload;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    use Upload;
    public function destroy($id){
        $image = PropertyImage::findOrFail($id);
        $path = $image->path;
        Storage::delete('public/'.$path);
        Storage::delete('public/'.str_replace('webp',$image->mime_type, $path));
        $image->delete();

        return back()->with('success','Image Deleted');
    }
}
