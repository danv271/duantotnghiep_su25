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
        Schema::create('orders', function (Blueprint $table) {
               $table->id();
            $table->unsignedBigInteger('user_id'); // FK đến bảng users (nếu có)
            $table->string('user_email')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_address')->nullable();
            $table->text('user_note')->nullable();
            $table->string('status_order')->default('pending');
            $table->string('status_payment')->default('unpaid');
            $table->string('type_payment')->nullable();
            $table->decimal('total_price', 15, 2)->default(0);
            $table->timestamps();

            // Foreign key nếu bạn có bảng users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('orders');
    }
};
