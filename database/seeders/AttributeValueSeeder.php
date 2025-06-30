<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;
use App\Models\Attribute;

class AttributeValueSeeder extends Seeder
{
    public function run(): void
    {
        // Đảm bảo có Attribute để liên kết
        if (Attribute::count() == 0) {
            \App\Models\Attribute::factory()->count(5)->create();
        }

        // Tạo dữ liệu AttributeValue
        AttributeValue::factory()->count(20)->create();
    }
}
