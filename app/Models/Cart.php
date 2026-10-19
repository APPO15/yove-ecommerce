<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];
     // عنصر السلة يخص مستخدمًا واحدًا
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // عنصر السلة يشير إلى منتج واحد
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
