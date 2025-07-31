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
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'shipping_cost')) {
                $table->decimal('shipping_cost', 15, 2)->default(30000)->after('total_price');
            }
            if (!Schema::hasColumn('orders', 'product_discount')) {
                $table->decimal('product_discount', 15, 2)->default(0)->after('shipping_cost');
            }
            if (!Schema::hasColumn('orders', 'shipping_discount')) {
                $table->decimal('shipping_discount', 15, 2)->default(0)->after('product_discount');
            }
            if (!Schema::hasColumn('orders', 'applied_vouchers')) {
                $table->json('applied_vouchers')->nullable()->after('shipping_discount');
            }
            if (!Schema::hasColumn('orders', 'user_name')) {
                $table->string('user_name')->nullable()->after('user_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['shipping_cost', 'product_discount', 'shipping_discount', 'applied_vouchers', 'user_name']);
        });
    }
};
