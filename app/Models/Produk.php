<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes; // 🔥 WAJIB ditambah ini

    protected $table = 'produk';

    protected $fillable = [
        'staff_id',
        'kategori_id',
        'nama',
        'penulis',
        'harga',
        'stok',
        'toko',
        'deskripsi',
        'tanggal_terbit',
        'bahasa',
        'jumlah_halaman', // ✅ asli dari DB
        'gambar'
    ];

    /*
    |--------------------------------------------------------------------------
    | 🔥 FIX: ALIAS HALAMAN
    |--------------------------------------------------------------------------
    */
    public function getHalamanAttribute()
    {
        return $this->jumlah_halaman;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function staff() {
        return $this->belongsTo(User::class, 'staff_id')->withTrashed(); // 🔥 FIX
    }   

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function keranjang() {
        return $this->hasMany(Keranjang::class);
    }

    public function pesananDetail() {
        return $this->hasMany(PesananDetail::class, 'produk_id');
    }

    public function ulasan() {
        return $this->hasMany(Ulasan::class);
    }

    public function transaksi() {
        return $this->hasMany(Transaksi::class);

    }

    
}
