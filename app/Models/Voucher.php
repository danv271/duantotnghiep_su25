<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'type',
        'discount_value',
        'min_order_amount',
        'max_usage',
        'used_count',
        'start_date',
        'end_date',
        'is_active'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
        'discount_value' => 'decimal:2',
        'min_order_amount' => 'decimal:2'
    ];

    /**
     * Kiểm tra voucher có hợp lệ không
     */
    public function isValid($orderAmount = 0)
    {
        $now = Carbon::now();
        
        return $this->is_active &&
            $now->between($this->start_date, $this->end_date) &&
            $this->used_count < $this->max_usage &&
            $orderAmount >= $this->min_order_amount;
    }

    /**
     * Tính toán giá trị giảm
     */
    public function calculateDiscount($orderAmount, $shippingCost = 0)
    {
        if (!$this->isValid($orderAmount)) {
            return 0;
        }

        switch ($this->type) {
            case 'shipping':
                return $shippingCost;
            case 'product':
                // Nếu discount_value < 100 thì coi như là percentage, ngược lại là fixed amount
                if ($this->discount_value < 100) {
                    return ($orderAmount * $this->discount_value) / 100;
                } else {
                    return min($this->discount_value, $orderAmount);
                }
            default:
                return 0;
        }
    }

    /**
     * Tăng số lần sử dụng
     */
    public function incrementUsage()
    {
        $this->increment('used_count');
    }

    /**
     * Kiểm tra voucher có phải loại shipping không
     */
    public function isShippingVoucher()
    {
        return $this->type === 'shipping';
    }

    /**
     * Kiểm tra voucher có phải loại product không
     */
    public function isProductVoucher()
    {
        return $this->type === 'product';
    }

    /**
     * Kiểm tra voucher có phải loại percentage không
     */
    public function isPercentageVoucher()
    {
        return $this->type === 'product' && $this->discount_value < 100;
    }

    /**
     * Kiểm tra voucher có phải loại fixed không
     */
    public function isFixedVoucher()
    {
        return $this->type === 'product' && $this->discount_value >= 100;
    }

    /**
     * Lấy label cho loại voucher
     */
    public function getTypeLabel()
    {
        switch ($this->type) {
            case 'shipping':
                return 'Miễn phí vận chuyển';
            case 'product':
                if ($this->discount_value < 100) {
                    return "Giảm {$this->discount_value}%";
                } else {
                    return "Giảm " . number_format($this->discount_value) . "đ";
                }
            default:
                return "Khuyến mãi";
        }
    }
}
