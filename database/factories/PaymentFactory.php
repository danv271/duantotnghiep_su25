<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;
use App\Models\Order;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'order_id' => Order::factory(), // tạo đơn hàng liên kết
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'cash_on_delivery']),
            'amount' => $this->faker->randomFloat(2, 50, 500),
            'payment_date' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
