<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variants extends Model
{
    use SoftDeletes;
    // tên bảng 
    protected $table = 'variants';
    // tên khóa chính
    protected $primaryKey = 'id';
    // các trường có thể gán giá trị
    protected $fillable = ['product_id', 'price', 'stock_quantity', 'status', 'created_at', 'updated_at'];
    
    // định nghĩa quan hệ với bảng products
    public function product(){
        return $this->belongsTo(product::class);
    }
    public function attributesValue(){
        return $this->belongsToMany(AttributeValue::class,'variant_attributes','variant_id','attribute_value_id');
    }
}
