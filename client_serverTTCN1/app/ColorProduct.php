<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    protected $fillable = ['name', 'product_id'];
    public function sizes()
    {
        return $this->hasMany('App\ColorSize', 'color_id', 'id');
    }
    public function pictures()
    {
        return $this->hasMany('App\ColorProductPicture', 'color_id', 'id');
    }
}
