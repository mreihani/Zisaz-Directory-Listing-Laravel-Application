<?php

namespace App\Services\ImageResizeServices;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageResizeService {
    public $image;
    public $dir;

    public function __construct($image, $dir) {
        $this->image = $image;
        $this->dir = $dir;
    }

    // large image rendreing
    public function resizeImage($width, $height) {

        if(is_null($this->image)) {
            return null;
        }

        $unique_image_name = hexdec(uniqid());

        $filename = $unique_image_name . '.' . 'jpg';

        $img = Image::make($this->image)->fit($width, $height)->encode('jpg');

        Storage::disk('public')->put('upload/' . $this->dir . '/' . $filename, $img);

        return 'storage/upload/' . $this->dir . '/' . $filename;
    }

    // for constrained width images
    public function resizeImageConstrainedWidth($width) {

        if(is_null($this->image)) {
            return null;
        }

        $unique_image_name = hexdec(uniqid());

        $filename = $unique_image_name . '.' . 'jpg';

        $img = Image::make($this->image)->encode('jpg')->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::disk('public')->put('upload/' . $this->dir . '/' . $filename, $img);

        return 'storage/upload/' . $this->dir . '/' . $filename;
    }

    // remove previously uploaded images
    public function removeExistingImage($image) {
        if($image && !is_null($image) && file_exists($image)) {
            unlink($image);
        }
    }
}