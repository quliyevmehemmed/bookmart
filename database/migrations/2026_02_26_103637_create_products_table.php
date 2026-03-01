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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Kitabın adı
        $table->string('author'); // Müəllif adı (istədiyin kimi əlavə etdik)
        $table->string('slug')->unique(); // URL üçün oxunaqlı ad
        $table->text('description')->nullable(); // Kitab haqqında geniş məlumat
        $table->decimal('price', 8, 2); // Qiymət (məsələn: 12.50)
        $table->decimal('old_price', 8, 2)->nullable();
        $table->string('image')->nullable(); // Kitabın şəklinin yolu
        
        // Kateqoriya ilə bağlantı
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        
        $table->integer('stock')->default(0); // Stokda neçə ədəd var
        $table->boolean('is_active')->default(true); // Satışda olub-olmaması
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
