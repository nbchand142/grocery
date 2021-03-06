<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ["name","category_id","price","description","stock","active"];

    function line_item(){
        return $this->hasMany(LineItem::class);
    }
    function category(){
        return $this->belongsTo(Category::class);
    }
    Function metadata(){
        return $this->hasMany(ProductMetaData::class);
    }
    Function image(){
        return $this->hasMany(ProductImage::class);
    }
}
