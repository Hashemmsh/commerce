<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function orders()
    {
        return $this->belongsTo(order::class)->withDefault();
    }
}
