<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cart;
use App\Models\User;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'total_quantity' => $this->faker->numberBetween(1, 20),
            'total_price' => $this->faker->numberBetween(100000, 1000000),
        ];
    }
}
