<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // tên bảng
    protected $table = 'categories';
    // khóa chính 
    protected $primaryKey = 'id';
    // các trường gán
    protected $fillable = ['category_name', 'parent_category_id', 'description', 'status', 'created_at', 'updated_at'];

    // quan hệ
    public function product(){
        return $this->belongsTo(product::class,'category_id');
    }

    public function category(){
        return $this->hasMany(category::class,'parent_category_id');
    }
    public function parentCategory(){
        return $this->belongsTo(category::class,'parent_category_id');
    }
}
