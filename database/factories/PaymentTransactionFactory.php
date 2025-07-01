<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;
use App\Models\Order;
use App\Models\PaymentTransaction;

class PaymentTransactionFactory extends Factory
{
    protected $model = PaymentTransaction::class;

    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(), // Tạo payment tương ứng
            'order_id' => Order::factory(),     // Tạo order tương ứng
            'gateway' => $this->faker->randomElement(['PayPal', 'Stripe', 'VNPAY']),
            'transaction_status' => $this->faker->randomElement(['success', 'failed', 'pending']),
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'currency' => $this->faker->currencyCode(),
            'transaction_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'response_transaction' => $this->faker->optional()->text(200),
        ];
    }
}
