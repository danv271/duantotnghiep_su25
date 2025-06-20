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
            'slug' => Str::slug('Electronics'),
            'description' => 'Electronic devices and accessories',
            'status' => 'active',
            'order' => 1,
            'is_featured' => true
        ]);

        $fashion = Category::create([
            'name' => 'Fashion',
            'slug' => Str::slug('Fashion'),
            'description' => 'Clothing and accessories',
            'status' => 'active',
            'order' => 2,
            'is_featured' => true
        ]);

        // Create subcategories for Electronics
        Category::create([
            'name' => 'Smartphones',
            'slug' => Str::slug('Smartphones'),
            'parent_category_id' => $electronics->id,
            'description' => 'Mobile phones and accessories',
            'status' => 'active',
            'order' => 1,
            'is_featured' => false
        ]);

        Category::create([
            'name' => 'Laptops',
            'slug' => Str::slug('Laptops'),
            'parent_category_id' => $electronics->id,
            'description' => 'Laptops and accessories',
            'status' => 'active',
            'order' => 2,
            'is_featured' => true
        ]);

        // Create subcategories for Fashion
        Category::create([
            'name' => 'Men\'s Clothing',
            'slug' => Str::slug('Men\'s Clothing'),
            'parent_category_id' => $fashion->id,
            'description' => 'Clothing for men',
            'status' => 'active',
            'order' => 1,
            'is_featured' => false
        ]);

        Category::create([
            'name' => 'Women\'s Clothing',
            'slug' => Str::slug('Women\'s Clothing'),
            'parent_category_id' => $fashion->id,
            'description' => 'Clothing for women',
            'status' => 'active',
            'order' => 2,
            'is_featured' => true
        ]);
    }
}
