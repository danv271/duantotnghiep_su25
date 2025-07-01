<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'user_email' => $this->faker->safeEmail,
            'user_phone' => $this->faker->phoneNumber,
            'user_address' => $this->faker->address,
            'user_note' => $this->faker->sentence,
            'status_order' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'cancelled']),
            'status_payment' => $this->faker->randomElement(['unpaid', 'paid']),
            'type_payment' => $this->faker->randomElement(['credit_card', 'cash_on_delivery', 'paypal']),
            'total_price' => $this->faker->randomFloat(2, 100000, 2000000),
        ];
    }
}
