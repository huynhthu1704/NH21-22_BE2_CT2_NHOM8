<?php

namespace App\Models;
use App\Models\Review;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    function review() {
        $this->hasMany(Review::class);
    }
    
}
