<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','total'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function order_Items()
    {
        return $this->hasMany(OrderItems::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
