<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingTransaction extends Model
{

    protected $table = 'pending_transactions';

    protected $fillable = [
        'vnp_txn_ref',
        'user_id',
        'user_email',
        'checkout_data',
        'amount',
        'status',
        'expires_at',
    ];

    protected $casts = [
        'checkout_data' => 'array',
        'expires_at' => 'datetime',
    ];

    // Quan hệ với User (nếu cần)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
