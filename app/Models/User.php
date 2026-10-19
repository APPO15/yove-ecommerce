<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // المستخدم لديه عدة طلبات
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // المستخدم لديه عدة عناصر في السلة
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // المستخدم لديه عدة منتجات في المفضلة
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // المستخدم لديه عدة تقييمات
    public function reviews()
    {
        return $this->hasMany(Review::class );
    }
}
