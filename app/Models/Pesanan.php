<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // 🔥 WAJIB: biar ga error plural (pesanans)
    protected $table = 'pesanan';

    protected $fillable = [
        'user_id',
        'total_harga',
        'status',
        'no_resi',
        'bukti_bayar',
        'metode_pembayaran',
        'metode_pengiriman',
        'alamat',
        'no_telepon',
        'diproses_oleh'
    ];

    // 🔥 RELASI USER (PEMBELI)
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed(); // 🔥 FIX
    }

    public function diprosesOleh()
    {
        return $this->belongsTo(User::class, 'diproses_oleh')->withTrashed(); // 🔥 FIX
    }

    // 🔥 DETAIL PESANAN
    public function detail()
    {
        return $this->hasMany(PesananDetail::class, 'order_id');
    }

    // 🔥 ULASAN
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    // 🔥 TRANSAKSI
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
