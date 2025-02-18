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
        Schema::create('meal_payment', function (Blueprint $table) {
            $table->foreignId('meal_id')->constrained('meals');
            $table->foreignId('payment_id')->constrained('payment');
            $table->unique(['meal_id', 'payment_id'])->primary();
            $table->unsignedBigInteger('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_payment');
    }
};
