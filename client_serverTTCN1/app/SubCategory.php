<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class SubCategory extends Model
{
    use NodeTrait;
    protected $table = 'sub_categories';
    protected $fillable = ['name', 'description', 'category_id', 'slug','parent_id'];

    public function parent()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
