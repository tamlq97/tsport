<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'email' => $this->email,
            'created_at' => date_format($this->created_at, 'Y-F-d H:i:s'),
            'role' => $this->roles,
            'supplier' => $this->whenLoaded('supplier'),
            'profile' => $this->whenLoaded('profile'), 
            'logo' => $this->logo
        ];
    }
}
