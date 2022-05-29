<?php

namespace App\Models;
use App\Models\Review;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'username',
        'password',
        'email',
        'birthday',
        'fullname',
        'phone',
        'city',
        'gender',
        'join_day',
        'role_id'
    ];
    function review() {
        $this->hasMany(Review::class);
    }
    
    
}
