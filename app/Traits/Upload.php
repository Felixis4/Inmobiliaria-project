<?php

namespace App\Traits;

use App\Models\propertyImages;
use Illuminate\Support\Str;

trait Upload {
    public function uploadfile($propertyId, $images){

        foreach($images as $image){

            $filename = Str::random(5).$image->getClientOriginalName();

            $path = $image->storeAs('images/'.$propertyId,$filename,config('filesystems.public'));

            $fullPath = storage_path(config('app.PUBLIC_PATH').$path);

            if (strtolower(pathinfo($fullPath, PATHINFO_EXTENSION)) == 'png') {
                $webp = $this->PNGextension($fullPath);
            }

            if (strtolower(pathinfo($fullPath, PATHINFO_EXTENSION)) == 'jpg'||strtolower(pathinfo($fullPath, PATHINFO_EXTENSION)) == 'jpeg') {
                $webp = $this->JPGextencion($fullPath);
            }

            $propertyImage = new propertyImages([
                $path = str_replace(['.jpg','.JPG','.jpeg','.JPEG','.png'], '.webp', $path),
                'property_id' => $propertyId,
                'path' => $path,
                'mime_type' => $image->getClientOriginalExtension(),
            ]);
            $propertyImage->save();
        }
    }
    protected function PNGextension($fullPath){
        $im = imagecreatefrompng($fullPath);
        imagepalettetotruecolor($im);
        imagealphablending($im, true);
        imagesavealpha($im, true);
        $webp = imagewebp($im, str_replace(['.png','.PNG'], '.webp', $fullPath));
        return $webp;
    }

    protected function JPGextencion($fullPath){
        $im = imagecreatefromjpeg($fullPath);
        $webp = imagewebp($im, str_replace(['.jpg','.JPG','.jpeg','.JPEG',], '.webp', $fullPath));
        return $webp;
    }
}
