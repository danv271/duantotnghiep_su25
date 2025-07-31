<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('pending_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('vnp_txn_ref')->unique(); // Mã giao dịch VNPAY
            $table->unsignedBigInteger('user_id')->nullable(); // ID người dùng (nếu đăng nhập)
            $table->string('user_email'); // Email để gửi nhắc nhở
            $table->json('checkout_data'); // Lưu dữ liệu checkout từ session
            $table->decimal('amount', 15, 2); // Số tiền
            $table->string('status')->default('pending'); // Trạng thái: pending, completed, cancelled
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('expires_at'); // Thời gian hết hạn (5 phút sau khi tạo)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
