<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    protected $table = 'pesanan_detail'; // WAJIB

    protected $fillable = [
        'order_id',
        'produk_id',
        'jumlah',
        'subtotal'
    ];

    public function pesanan() {
        return $this->belongsTo(Pesanan::class, 'order_id');
    }

    public function produk() {
        return $this->belongsTo(Produk::class)->withTrashed(); // 🔥 ini penting
    }


}
 