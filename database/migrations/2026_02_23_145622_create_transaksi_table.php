<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                  ->constrained('pesanan')
                  ->onDelete('cascade');

            $table->foreignId('produk_id')
                  ->constrained('produk')
                  ->onDelete('cascade');

            $table->foreignId('staff_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->integer('jumlah');
            $table->decimal('total_harga', 12, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
