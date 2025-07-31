<?php

namespace App\Jobs;

use App\Mail\PaymentReminderMail;
use App\Models\PendingTransaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPaymentReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $transaction;
    /**
     * Create a new job instance.
     */
    public function __construct(PendingTransaction $transaction)
    {
        //
        $this->transaction = $transaction;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
         // Kiểm tra nếu giao dịch vẫn chưa hoàn tất
            if ($this->transaction->status === 'pending') {
                Mail::to($this->transaction->user_email)->send(new PaymentReminderMail($this->transaction));
            }
    }
}
