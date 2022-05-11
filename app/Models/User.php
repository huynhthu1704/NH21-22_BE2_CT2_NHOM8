<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    
}
