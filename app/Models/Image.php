<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }
}
