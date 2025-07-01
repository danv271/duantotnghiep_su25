<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Variant;

class VariantSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 20 bản ghi Variant
        Variant::factory()->count(20)->create();
    }
}
