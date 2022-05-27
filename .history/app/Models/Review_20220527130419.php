<?php

namespace App\Models;
use
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    function user() {
        $this->hasMany(Review::class);
    }
}
