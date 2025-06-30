<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    public function definition(): array
    {
        $variant = Variant::inRandomOrder()->first() ?? Variant::factory()->create();
        $order = Order::inRandomOrder()->first() ?? Order::factory()->create();

        $quantity = $this->faker->numberBetween(1, 5);
        $variant_price = $variant->price;
        $total_price = $variant_price * $quantity;

        return [
            'order_id' => $order->id,
            'variant_id' => $variant->id,
            'variant_price' => $variant_price,
            'quantity' => $quantity,
            'total_price' => $total_price,
        ];
    }
}
