<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\SubCategory;
use App\Http\Resources\Product\Color\Color;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class Product extends JsonResource
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
        $date = new DateTime($this->created_at);

        return [
            'id' => $this->id,
            'masp' => $this->masp,
            'product_name' => $this->product_name,
            'product_price' =>  $this->product_price,
            'product_description' => $this->product_description,
            'discount' => $this->discount,
            'discount_available' => $this->discount_available == 1 ? true : false,
            'product_available' => $this->product_available == 1 ? true : false,
            'category_id' => $this->category_id,
            'color' => $this->colors,
            'supplier' => $this->supplier,
            'newest' => $this->created_at >= Carbon::now()->subDays(7) ? true : false,
            'supplier_id' => $this->supplier_id,
            'created_at' => $date->format('Y-F-d H:i:s'),
            'imgLink' => asset('storage/products/' . $this->id . '/'),
            'category' => new SubCategory($this->category),
            'categories' => SubCategory::collection($this->categories),
            'picture' => $this->picture,
            'second_image' => $this->second_image,
            'slug' => $this->slug
        ];
    }
}
