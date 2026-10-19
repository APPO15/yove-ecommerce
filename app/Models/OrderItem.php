<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
     protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // عنصر الطلب ينتمي إلى طلب واحد
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // عنصر الطلب يشير إلى منتج واحد
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

