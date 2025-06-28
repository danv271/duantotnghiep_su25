<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create parent categories
        $electronics = Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices and accessories',
            'status' => 'active',
        ]);

        $fashion = Category::create([
            'name' => 'Fashion',
            'description' => 'Clothing and accessories',
            'status' => 'active',
        ]);

        // Create subcategories for Electronics
        Category::create([
            'name' => 'Smartphones',
            'parent_category_id' => $electronics->id,
            'description' => 'Mobile phones and accessories',
            'status' => 'active',
        ]);

        Category::create([
            'name' => 'Laptops',
            'parent_category_id' => $electronics->id,
            'description' => 'Laptops and accessories',
            'status' => 'active',
        ]);

        // Create subcategories for Fashion
        Category::create([
            'name' => 'Men\'s Clothing',
            'parent_category_id' => $fashion->id,
            'description' => 'Clothing for men',
            'status' => 'active',
        ]);

        Category::create([
            'name' => 'Women\'s Clothing',
            'parent_category_id' => $fashion->id,
            'description' => 'Clothing for women',
            'status' => 'active',
        ]);
    }
}
