<?php

namespace Database\Factories;

use App\Models\Variant;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariantFactory extends Factory
{
    protected $model = Variant::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(), // Tạo product liên kết hoặc gán sẵn ID nếu có
            'price' => $this->faker->randomFloat(2, 100, 1000), // giá từ 100 đến 1000
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement(['active', 'inactive', 'out_of_stock']),
        ];
    }
}
