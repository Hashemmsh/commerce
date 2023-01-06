<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'price',
        'quantity',
        'user_id',
        'product_id'
    ];
    public function user()
    {
         return $this->belongsTo(User::class)->withDefault();
    }
    public function product()
    {
         return $this->belongsTo(Product::class)->withDefault();
    }
}
