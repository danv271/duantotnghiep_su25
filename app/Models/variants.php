<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variants extends Model
{
    use SoftDeletes;

    protected $table = 'variants';
    protected $primaryKey = 'id';

    protected $fillable = ['product_id', 'price', 'stock_quantity', 'status', 'created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }

    public function attributesValue()
    {
        return $this->belongsToMany(
            \App\Models\AttributeValue::class,
            'variant_attributes',
            'variant_id',
            'attribute_value_id'
        );
    }
}
