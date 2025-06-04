<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        FacadesDB::table('roles')->insert([
            [
                'role_name' => 'Admin',
                'description' => 'Quản trị viên hệ thống',
            ],
            [
                'role_name' => 'Editor',
                'description' => 'Biên tập viên nội dung',
            ],
            [
                'role_name' => 'User',
                'description' => 'Người dùng bình thường',
            ],
        ]);
    }
}
