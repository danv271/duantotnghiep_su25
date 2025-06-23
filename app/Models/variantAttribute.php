<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttribute extends Model
{
    // tên bảng
    protected $table = 'variant_attributes';
    // các trường gán
    protected $fillable = ['variant_id', 'attribute_value_id', 'created_at', 'updated_at'];
    // khóa chính
    protected $primaryKey = 'variant_attributes_id';
    
    // quan hệ
    // public function variants(){
    //     return $this->belongsTo(variants::class);
    // }
    // public function attributesValue(){
    //     return $this->belongsTo(attributeValue::class,'attribute_value_id');
    // }
}
