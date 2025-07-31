<?php

use App\Jobs\SendPaymentReminderEmail;
use App\Models\PendingTransaction;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('pending-transactions:check', function () {
    $transactions = PendingTransaction::where('status', 'pending')
        ->where('expires_at', '<=', now())
        ->get();

    foreach ($transactions as $transaction) {
        SendPaymentReminderEmail::dispatch($transaction);
    }

    $this->info('Checked pending transactions and dispatched reminder emails.');
})->describe('Check and send reminders for pending transactions');

Schedule::command('pending-transactions:check')->everyMinute();
