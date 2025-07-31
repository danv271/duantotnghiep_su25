<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vouchers')->insert([
            [
                'code' => 'FREESHIP',
                'name' => 'Miễn phí vận chuyển',
                'description' => 'Giảm 30.000đ phí vận chuyển cho đơn hàng bất kỳ',
                'type' => 'shipping',
                'discount_value' => 30000,
                'min_order_amount' => 0,
                'max_usage' => 100,
                'used_count' => 0,
                'start_date' => Carbon::now()->subDays(1),
                'end_date' => Carbon::now()->addDays(30),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SALE10',
                'name' => 'Giảm 10% tổng đơn',
                'description' => 'Giảm 10% cho tổng giá trị sản phẩm',
                'type' => 'product',
                'discount_value' => 10, // percent (nhỏ hơn 100)
                'min_order_amount' => 200000,
                'max_usage' => 200,
                'used_count' => 0,
                'start_date' => Carbon::now()->subDays(1),
                'end_date' => Carbon::now()->addDays(30),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'SALE50K',
                'name' => 'Giảm 50.000đ cho đơn từ 500.000đ',
                'description' => 'Giảm 50.000đ cho đơn hàng từ 500.000đ trở lên',
                'type' => 'product',
                'discount_value' => 50000, // fixed amount (lớn hơn hoặc bằng 100)
                'min_order_amount' => 500000,
                'max_usage' => 50,
                'used_count' => 0,
                'start_date' => Carbon::now()->subDays(1),
                'end_date' => Carbon::now()->addDays(30),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
