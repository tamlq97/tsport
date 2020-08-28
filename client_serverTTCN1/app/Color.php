<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name', 'product_id'];
    public function sizes()
    {
        return $this->belongsToMany('App\Size');
    }

    public function pictures()
    {
        return $this->hasMany('App\ColorProductPicture');
    }
}
