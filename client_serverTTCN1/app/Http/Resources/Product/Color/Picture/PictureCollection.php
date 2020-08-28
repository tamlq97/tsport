<?php

namespace App\Http\Resources\Product\Color\Picture;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PictureCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
