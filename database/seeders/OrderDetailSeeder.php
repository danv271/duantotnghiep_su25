<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderIDs = DB::table('orders')->pluck('id')->toArray();
        $variantIDs = DB::table('variants')->pluck('id')->toArray();

        $orderDetails = [];

        foreach ($orderIDs as $orderID) {
            // Mỗi đơn hàng có từ 1 đến 3 sản phẩm
            $variantSample = fake()->randomElements($variantIDs, rand(1, 3));

            foreach ($variantSample as $variantID) {
                $price = fake()->numberBetween(100000, 5000000);
                $quantity = fake()->numberBetween(1, 5);
                $total = $price * $quantity;

                $orderDetails[] = [
                    'order_id' => $orderID,
                    'variant_id' => $variantID,
                    'variant_price' => $price,
                    'quantity' => $quantity,
                    'total_price' => $total,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        DB::table('order_details')->insert($orderDetails);
    }
}
