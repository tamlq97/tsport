<?php

namespace App\Services;

class ColorProductPictureService
{
    public function getImageExt($image)
    {
        $temp = explode('.', $image);
        $ext = substr($temp[count($temp) - 1], 0, 3);
        return $ext == 'jpe' ? 'jpeg' : ($ext == 'web' ? 'webp' : $ext);
    }

    public function getImages($images)
    {
        $images = explode(',', $images);
        $images = implode('', $images);
        return explode('https', $images);
    }
}
