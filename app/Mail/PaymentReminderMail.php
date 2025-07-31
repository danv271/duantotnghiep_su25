<?php

namespace App\Mail;

use App\Models\PendingTransaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction;

    public function __construct(PendingTransaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function build()
    {
        $url = route('checkout.continue', ['vnp_TxnRef' => $this->transaction->vnp_txn_ref],false);

        return $this->subject('Bạn chưa hoàn tất thanh toán đơn hàng')
            ->view('payment_reminder')
            ->with([
                'checkoutData' => json_decode($this->transaction->checkout_data, true),
                'vnp_txn_ref' => $this->transaction->vnp_txn_ref,
                'continue_url' => 'https://demo.vistar.click' .$url,
            ]);
    }
}
