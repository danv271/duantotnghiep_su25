<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{ 
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'user_email',
        'user_phone',
        'user_address',
        'user_note',
        'status_order',
        'status_payment',
        'type_payment',
        'total_price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}
