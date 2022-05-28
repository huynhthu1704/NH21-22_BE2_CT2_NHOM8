<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }
    
}
