<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Discount;
use Egulias\EmailValidator\Warning\Comment;

class Product extends Model
{

    public $table = 'products';

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }

    public function discount() {
        return $this->belongsTo(Discount::class);
    }

    public function orderItem() {
        return $this->hasMany(OrderItem::class);
    }

    public function review() {
        return $this->belongsTo(Review::class);
    }
}
