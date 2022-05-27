<?php

namespace App\Models;
use            $table->foreign('product_id')->references('id')->on('products');
Review;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'username',
        'password',
        'email',
        'birthday',
        'full_name',
        'phone',
        'address',
        'gender',
        'join_day',
        'role_id'
    ];
    function review() {
        $this->hasMany(Review::class);
    }
    
}
