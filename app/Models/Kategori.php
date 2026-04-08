<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // 🔥 WAJIB (biar gak jadi 'kategoris')
    protected $table = 'kategori';

    protected $fillable = ['nama_kategori'];

    public function produk() {
        return $this->hasMany(Produk::class);
    }
}
