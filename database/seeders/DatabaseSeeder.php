<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        RoleSeeder::class, 
    ]);

    User::factory(10)->create(); 

    $this->call([
        CategorySeeder::class,
        ProductSeeder::class,
        VariantSeeder::class,
        OrderSeeder::class,
        OrderDetailSeeder::class,
        PaymentSeeder::class,
        PaymentTransactionSeeder::class,
        AttributeSeeder::class,
        AttributeValueSeeder::class,
        VariantAttributeSeeder::class,
        CartSeeder::class,
        CartItemSeeder::class,
        ProductImageSeeder::class,
    ]);
}
}
