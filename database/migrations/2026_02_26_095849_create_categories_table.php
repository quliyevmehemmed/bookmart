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
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Kateqoriyanın adı (məs: Roman)
        $table->string('slug')->unique(); // URL üçün (məs: roman)
        
        // Bu sətir Alt/Üst kateqoriya məntiqi üçündür:
        $table->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete();
        
        $table->boolean('status')->default(true); // Aktiv/Passiv etmək üçün
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
