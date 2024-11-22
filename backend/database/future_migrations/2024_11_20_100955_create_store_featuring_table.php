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
        Schema::create('store_featuring', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->foreignId('store_id')->constrained('stores');
            $table->foreignId('featured_store_id')->constrained('stores');
            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED'])->default('PENDING');
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
        Schema::dropIfExists('store_featuring');
    }
};
