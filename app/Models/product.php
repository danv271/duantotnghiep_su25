<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'category_id', 'base_price', 'created_at', 'updated_at'];

    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }
    public function images(){
        return $this->hasMany(productsImage::class,"product_id");
    }
    public function variants(){
        return $this->hasMany(variants::class,"product_id");
    }
}
