<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'total_price',
        'phone',
        'address',
        'status',
    ];
     // الطلب يخص مستخدمًا واحدًا
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // الطلب يحتوي على عدة عناصر (منتجات)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
