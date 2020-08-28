<?php

namespace App\Http\Resources\Product\Color\Picture;

use Illuminate\Http\Resources\Json\JsonResource;

class Picture extends JsonResource
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
            'src' => $this->src,
            'type' => $this->type,
            'extension' => $this->extension,
            'color_id'=> $this->color_id,
            'product_id' => $this->product_id,
            'product' => $this->product,
            'imgLink' => asset('storage/products/'. $this->product->id)
        ];
    }
}
