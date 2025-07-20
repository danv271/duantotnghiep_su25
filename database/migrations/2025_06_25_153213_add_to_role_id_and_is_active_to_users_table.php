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
        // Đã có role_id và is_active trong bảng users từ migration trước, không cần thêm gì ở đây.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Không cần xóa gì vì không thêm gì ở up()
    }
};
