<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id','user_id','total' ,'transaction_id'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function orders()
    {
        return $this->belongsTo(Order::class)->withDefault();
    }
}
