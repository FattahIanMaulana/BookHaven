<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->decimal('total_harga', 12, 2);

            $table->enum('status', [
                'menunggu_verifikasi',
                'tidak_diproses',
                'dibatalkan_sistem',
                'diterima'
            ])->default('menunggu_verifikasi');

            $table->string('no_resi')->nullable();
            $table->string('bukti_bayar')->nullable();

            $table->enum('metode_pembayaran', ['QRIS', 'Transfer Bank']);
            $table->enum('metode_pengiriman', ['JNE', 'J&T']);

            $table->text('alamat');
            $table->string('no_telepon', 20);

            $table->foreignId('diproses_oleh')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
