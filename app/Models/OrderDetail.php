<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailFactory> */
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'variant_id',
        'variant_price',
        'quantity',
        'total_price',
    ];
}
