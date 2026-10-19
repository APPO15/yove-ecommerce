<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
    ];

    // المنتج ينتمي إلى تصنيف واحد
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // المنتج قد يوجد في عدة عناصر داخل الطلبات
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // المنتج قد يوجد في سلال عدة مستخدمين
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // المنتج قد يضاف إلى المفضلة عند عدة مستخدمين
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // المنتج قد يحصل على عدة تقييمات
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
