<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentTransaction;

class PaymentTransactionSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 20 giao dịch thanh toán giả lập
        PaymentTransaction::factory()->count(20)->create();
    }
}
