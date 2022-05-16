<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cate_id');
    }

    
}
