<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 8 thuộc tính mẫu
        Attribute::factory()->count(8)->create();
    }
}
