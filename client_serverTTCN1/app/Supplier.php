<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $guarded = [];
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
