<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // 🔥 FIX PLURALISASI TABEL
    protected $table = 'transaksi';

    protected $fillable = [
        'order_id','produk_id','staff_id','user_id','jumlah','total_harga'
    ];

    public function pesanan() {
        return $this->belongsTo(Pesanan::class, 'order_id');
    }

    public function produk() {
        return $this->belongsTo(Produk::class)->withTrashed(); // 🔥 wajib
    }

    public function staff() {
        return $this->belongsTo(User::class, 'staff_id')->withTrashed(); // 🔥 FIX
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id')->withTrashed(); // 🔥 FIX
    }

}
