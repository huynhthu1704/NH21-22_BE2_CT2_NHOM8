<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    public $timestamp = true;

    protected $guarded = [
        'id',
        'color_name',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'id',
        'color_name',
        'created_at',
        'updated_at'
    ];
    
    public function products()
    {
        return $this->belongsToMany('colors', 'images');
    }
}
