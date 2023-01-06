<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = ['price' , 'quantity' , 'user_id' , 'total' , 'order_id' ,'product_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function products()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
    public function orders()
    {
        return $this->belongsTo(Order::class)->withDefault();
    }
}
