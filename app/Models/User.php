<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    
    use HasFactory, Notifiable, SoftDeletes; // 🔥 TAMBAH INI

    protected $fillable = [
        'name', 'email', 'password', 'role', 'alamat', 'no_telepon'
    ];

    protected $hidden = ['password', 'remember_token'];

    public function keranjang() {
        return $this->hasMany(Keranjang::class);
    }

    public function pesanan() {
        return $this->hasMany(Pesanan::class);
    }

    public function ulasan() {
        return $this->hasMany(Ulasan::class);
    }

    public function transaksi() {
        return $this->hasMany(Transaksi::class, 'user_id');
    }

    public function transaksiStaff() {
        return $this->hasMany(Transaksi::class, 'staff_id');
    }
}
