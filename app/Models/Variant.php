<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    /** @use HasFactory<\Database\Factories\VariantFactory> */
    use HasFactory;
    protected $table = 'variants';
    protected $fillable = [
        'product_id',
        'stock_quantity',
        'price',
        'status',
    ];
}
