<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait ImageUploadTrait
{
    public function uploadImage(UploadedFile $image, $path)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path($path);
        $image->move($destinationPath, $imageName);

        return $imageName;
    }
}
