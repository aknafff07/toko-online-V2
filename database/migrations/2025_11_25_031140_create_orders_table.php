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
        $table->string('customer_name');    // Nama Pembeli
        $table->string('customer_phone');   // No HP (Tambahan baru biar keren)
        $table->text('address');            // Alamat
        $table->decimal('total_price', 15, 2);
        $table->string('status')->default('Unpaid'); // Status: Unpaid, Paid, Sent
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
