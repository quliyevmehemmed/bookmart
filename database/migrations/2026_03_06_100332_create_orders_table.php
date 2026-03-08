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
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // İstifadəçi ilə əlaqə
            $table->string('order_number')->unique();
            $table->string('full_name');
            $table->string('phone');
            $table->string('address');
            $table->string('shipping_method');
            $table->decimal('shipping_price', 8, 2);
            $table->decimal('total_price', 10, 2); // Bütün kitablar + çatdırılma
            $table->string('payment_method');
            $table->string('status')->default('pending');
            $table->timestamps();
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
