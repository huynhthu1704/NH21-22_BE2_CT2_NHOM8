<?php

namespace App\Models;
use App\Models\Review;
use App\Models\Order;
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
        'district',
        'ward',
        'gender',
        'join_day',
        'role_id'
    ];


    function reviews() {
        $this->hasMany(Review::class);
    }
    public function orders()
    {
        $this->hasMany(Order::class);
    }
    
}
