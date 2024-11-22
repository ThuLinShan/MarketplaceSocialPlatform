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
        Schema::create('store_themes', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->foreignId('store_id')->constrained('stores');
            $table->string('background_image')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
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
        Schema::dropIfExists('store_themes');
    }
};
