<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';

    protected $fillable = [
        'user_id',
        'produk_id',
        'order_id',
        'rating',
        'komentar'
    ];

    public function user() {
        return $this->belongsTo(User::class)->withTrashed(); // 🔥 FIX
    }

    public function produk() {
        return $this->belongsTo(Produk::class);
    }

    public function pesanan() {
        return $this->belongsTo(Pesanan::class, 'order_id');
    }
}
