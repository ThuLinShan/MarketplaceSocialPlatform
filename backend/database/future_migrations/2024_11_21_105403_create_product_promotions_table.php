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
        Schema::create('product_promotions', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->foreignId('store_id')->constrained('stores');
            $table->string('name');
            $table->decimal('promotion_value');
            $table->string('promotion_type');
            $table->bigInteger('starting_at');
            $table->bigInteger('ending_at');
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('product_promotions');
    }
};