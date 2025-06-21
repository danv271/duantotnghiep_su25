<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    // tên bảng
    protected $table = 'attributes';
    // khóa chính
    protected $primarykey = 'id';
    // các trường gán
    protected $fillable = ['name', 'created_at', 'updated_at'];

    // quan hệ
    public function attributesValues(){
        return $this->hasMany(AttributeValue::class,'attribute_id');
    }
}
