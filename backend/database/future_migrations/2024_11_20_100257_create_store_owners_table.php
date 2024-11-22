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
        Schema::create('store_owners', function (Blueprint $table) {
            $table->unsignedbigInteger('id')->primary();
            $table->foreignId('store_id')->constrained('stores');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('role', ['SUPER', 'NORMAL'])->default('NORMAL');
            $table->string('password');
            // $table->string('access_key')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('store_owners');
    }
};
