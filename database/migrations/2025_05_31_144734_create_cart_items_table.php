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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('variant_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('cart_id')
                  ->references('id')
                  ->on('carts')
                  ->onDelete('cascade');

            $table->foreign('variant_id')
                  ->references('id')
                  ->on('variants')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('cart_items', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            $table->dropForeign(['variant_id']);
        });
        Schema::dropIfExists('cart_items');
    }
};
