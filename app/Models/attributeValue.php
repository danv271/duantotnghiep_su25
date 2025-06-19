<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    // tên bảng
    protected $table = 'attributes_values';
    // khóa chính
    protected $primaryKey = 'id';
    // các trường gán
    protected $fillable = ['attribute_id', 'value', 'created_at', 'updated_at'];

    // quan hệ
    public function attribute(){
        return $this->belongsTo(Attribute::class,'attribute_id');
    }
    public function variants(){
        return $this->belongsToMany(variants::class,'variant_attributes','attribute_value_id','variant_id');
    }
}
