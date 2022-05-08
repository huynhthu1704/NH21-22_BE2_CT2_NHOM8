<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public $timestamps = true;

    protected $guarded = [
        'id',
        'product_name',
        'cate_id',
        'brand_id',
        'description',
        'is_feature',
        'dimension_id',
        'quantity',
        'sale_amount'
    ];

    protected $fillable = [
        'product_name',
        'cate_id',
        'brand_id',
        'description',
        'is_feature',
        'dimension_id',
        'quantity',
        'sale_amount',
    ];

    public function colors()
    {
        return $this->belongsToMany('products', 'images');
    }
}
