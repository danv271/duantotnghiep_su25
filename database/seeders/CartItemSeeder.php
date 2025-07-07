<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartItem;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 50 dòng dữ liệu giỏ hàng chi tiết
        CartItem::factory()->count(50)->create();
    }
}
