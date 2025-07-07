<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $table = 'attributes_values';

    protected $fillable = ['attribute_id', 'value'];

    // Quan hệ với Attribute
    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }

    // Quan hệ với các biến thể
    public function variants()
    {
        return $this->belongsToMany(
            \App\Models\Variants::class,
            'variant_attributes',
            'attribute_value_id',
            'variant_id'
        );
    }
}
