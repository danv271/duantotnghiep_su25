<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 10 giỏ hàng mẫu
        Cart::factory()->count(10)->create();
    }
}
