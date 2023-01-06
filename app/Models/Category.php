<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,SoftDeletes ,Trans;

    protected $fillable= [
        'name',
        'image',
        'parent_id'
    ];
    public function parent()
    {
        return $this->belongsTO(Category::class ,'parent_id')->withDefault();

    }
    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }


    // protected function name(): Attribute
    // {
    //     return Attribute::make(
    //         get: function ($value) {

    //             if($value){
    //                 return json_decode($value , true)[app()->currentLocale()];
    //              }
    //              return $value;
    //         },
    //     );
    // }

}
