<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIDs = DB::table('users')->pluck('id')->toArray();

        $orders = [];

        for ($i = 0; $i < 20; $i++) {
            $orders[] = [
                'user_id' => fake()->randomElement($userIDs),
                'user_email' => fake()->safeEmail(),
                'user_phone' => fake()->phoneNumber(),
                'user_address' => fake()->address(),
                'user_note' => fake()->optional()->sentence(),
                'status_order' => fake()->randomElement(['pending', 'processing', 'shipped', 'completed', 'cancelled']),
                'status_payment' => fake()->randomElement(['unpaid', 'paid', 'refunded']),
                'type_payment' => fake()->randomElement(['cod', 'bank_transfer', 'credit_card']),
                'total_price' => fake()->numberBetween(100000, 10000000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('orders')->insert($orders);
    }
}
