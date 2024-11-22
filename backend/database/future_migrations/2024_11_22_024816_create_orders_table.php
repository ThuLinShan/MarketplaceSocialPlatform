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
            $table->unsignedBigInteger('id')->primary();
            $table->foreignId('buyer_id')->constrained('buyers');
            $table->decimal('total_price');
            $table->decimal('promotion_value')->default(0);
            $table->decimal('tax_percent')->default(0);
            $table->decimal('tax_amount')->default(0);
            $table->decimal('final_price');
            $table->unsignedBigInteger('payment_id');
            $table->string('delivery_address');
            $table->enum('delivery_status', ['PREPARING', 'DELIVERING', 'DELIVERED']);
            $table->decimal('delivery_total_cost');
            $table->enum('order_status', ['PENDING', 'ACCEPTED', 'REJECTED', 'DELIVERING', 'DELIVERED', 'COMPLETED']);
            $table->integer('version')->default(1);
            $table->bigInteger('updated_at')->nullable();
            $table->bigInteger('created_at')->nullable();
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
