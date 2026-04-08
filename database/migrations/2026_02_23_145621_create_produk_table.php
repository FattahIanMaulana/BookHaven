<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();

            $table->foreignId('staff_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('kategori_id')
                  ->constrained('kategori')
                  ->onDelete('cascade');

            $table->string('nama');
            $table->string('penulis');
            $table->decimal('harga', 12, 2);
            $table->integer('stok');
            $table->string('toko')->default('BrookHaven');
            $table->text('deskripsi');
            $table->date('tanggal_terbit');
            $table->string('bahasa', 50);
            $table->integer('jumlah_halaman');
            $table->string('gambar');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
