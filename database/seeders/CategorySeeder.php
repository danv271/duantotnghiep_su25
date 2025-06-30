<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 10 danh mục gốc
        Category::factory()->count(10)->create([
            'parent_category_id' => null
        ]);

        // Tạo 20 danh mục con
        Category::factory()->count(20)->create();
    }
}
