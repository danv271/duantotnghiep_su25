<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('role_id')->nullable()->after('id'); // Thêm cột role_id
            $table->boolean('is_active')->default(true)->after('role_id'); // Thêm cột is_active
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('role_id'); // Xóa cột role_id
            $table->dropColumn('is_active'); // Xóa cột is_active
        });
    }
};
