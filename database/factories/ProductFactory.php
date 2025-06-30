<?php

namespace Database\Factories;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'category_id' => Category::inRandomOrder()->value('id') ?? Category::factory(),
            'base_price' => $this->faker->numberBetween(10000, 1000000),
        ];
    }
}
