<?php

namespace App\Traits;

use App\Http\Requests\ImageRequest;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait Upload {
    public function uploadfile($propertyId, $images){

        $imageRequest = new ImageRequest();
        $imageValidator = Validator::make(['images' => $images], $imageRequest->rules());

        if ($imageValidator->fails()) {
            return redirect()->back()->withErrors($imageValidator);
        }

        foreach($images as $image){

            $filename = Str::random(5).$image->getClientOriginalName();

            $path = $image->storeAs('images/'.$propertyId,$filename,'public');

            $fullPath = storage_path('app/public/'.$path);

            if (strtolower(pathinfo($fullPath, PATHINFO_EXTENSION)) == 'png') {
                $im = imagecreatefrompng($fullPath);
                imagepalettetotruecolor($im);
                imagealphablending($im, true);
                imagesavealpha($im, true);
                $webp = imagewebp($im, str_replace(['.png','.PNG'], '.webp', $fullPath));
            }

            if (strtolower(pathinfo($fullPath, PATHINFO_EXTENSION)) == 'jpg'||strtolower(pathinfo($fullPath, PATHINFO_EXTENSION)) == 'jpeg') {
                $im = imagecreatefromjpeg($fullPath);
                $webp = imagewebp($im, str_replace(['.jpg','.JPG','.jpeg','.JPEG',], '.webp', $fullPath));
            }

            $propertyImage = new PropertyImage([
                $path = str_replace(['.jpg','.JPG','.jpeg','.JPEG','.png'], '.webp', $path),
                'property_id' => $propertyId,
                'path' => $path,
                'mime_type' => $image->getClientOriginalExtension(),
            ]);
            $propertyImage->save();
        }
    }
}
