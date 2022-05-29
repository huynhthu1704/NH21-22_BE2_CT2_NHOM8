<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    function user() {
        $this->hasMany(User::class);
    }
    
    function product() {
        $this->belongsTo(Product::class);
    }
}
