<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productIDs = DB::table('products')->pluck('id')->toArray();

        $variants = [];

        foreach ($productIDs as $productID) {
            $variants[] = [
                'product_id' => $productID,
                'price' => fake()->numberBetween(100000, 10000000),
                'stock_quantity' => fake()->numberBetween(1, 100),
                'status' => fake()->numberBetween(0, 1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('variants')->insert($variants);
    }
}
