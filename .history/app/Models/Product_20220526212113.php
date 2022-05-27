<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    
    public $table = 'products';

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }

    public function discounts() {

    }
}
