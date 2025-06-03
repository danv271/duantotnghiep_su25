<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;

class OrderDetailSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 50 dòng order_details
        OrderDetail::factory()->count(50)->create();
    }
}
