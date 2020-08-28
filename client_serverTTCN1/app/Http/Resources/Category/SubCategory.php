<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class SubCategory extends JsonResource
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
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'descendants' => SubCategory::descendantsOf($this->id),
            'path' => $this->ancestors->count()
                ? implode('/', $this->ancestors->pluck('name')->toArray())
                : '/',
            'slug' => $this->slug,
            'parent' => $this->parent,
            // 'parent1' => new SubCategory($this->parent)
        ];
    }
}
