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
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        // Relasi ke tabel orders (Wajib ada tabel orders dulu)
        $table->foreignId('order_id')->constrained()->onDelete('cascade');

        // Relasi ke tabel products
        $table->foreignId('product_id')->constrained();

        $table->integer('quantity');
        $table->decimal('price', 15, 2); // Harga saat dibeli
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
