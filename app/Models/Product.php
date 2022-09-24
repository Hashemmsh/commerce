<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function category()
    {
        return $this->belongsTo(category::class)->withDefault();
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function order_Items()
    {
        return $this->hasMany(OrderItems::class);
    }
    public function promocodes()
    {
        return $this->hasMany(Promocode::class);
    }
}