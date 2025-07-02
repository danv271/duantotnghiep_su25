<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VariantAttribute;

class VariantAttributeSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 50 bản ghi variant_attributes ngẫu nhiên
        VariantAttribute::factory()->count(50)->create();
    }
}
