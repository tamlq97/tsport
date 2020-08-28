<?php

namespace App\Http\Resources\Product\Color;

use App\Http\Resources\Product\Color\Picture\Picture;
use App\Http\Resources\Product\Color\Size\Size;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class Color extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sizes' => Size::collection($this->sizes),
            'pictures' => Picture::collection($this->pictures),
            // 'pictures' => $this->whenPivotLoaded('pictures');
        ];
    }
}
