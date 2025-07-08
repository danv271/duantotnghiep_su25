<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo 10 user giả
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password'), // mật khẩu mặc định
                'role_id' => fake()->randomElement([1, 2]), // ví dụ: 1=user, 2=admin
                'is_active' => fake()->boolean(90), // 90% người dùng đang hoạt động
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
