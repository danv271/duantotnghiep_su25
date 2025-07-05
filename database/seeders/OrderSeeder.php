<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 20 đơn hàng mẫu
        Order::factory()->count(10)->create();
    }
}
