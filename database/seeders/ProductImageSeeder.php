<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Product::all()->each(function ($product) {
            ProductImage::factory()->count(3)->create([
                'product_id' => $product->id,
            ]);
        });
    }
}
