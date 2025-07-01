<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cart;
use App\Models\Variant;

class CartItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cart_id' => Cart::inRandomOrder()->first()?->id ?? Cart::factory(),
            'variant_id' => Variant::inRandomOrder()->first()?->id ?? Variant::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
