<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class OrderItem extends Model
{
    use HasFactory;
    public function order() {
        return $this->belongsTo(Order::class);
    }
    public function
}
