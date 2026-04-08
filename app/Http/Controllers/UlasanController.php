<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        // 🔥 WAJIB LOGIN (ANTI NULL USER)
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // 🔥 VALIDASI (LEBIH AMAN)
        $request->validate([
            'produk_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:1000'
        ]);

        // 🔥 CEK PERNAH BELI & SUDAH DITERIMA
        $pesanan = PesananDetail::where('produk_id', $request->produk_id)
            ->whereHas('pesanan', function($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->where('status','diterima');
            })
            ->first();

        if (!$pesanan) {
            return back()->with('error','Kamu belum bisa memberikan ulasan');
        }

        // 🔥 CEK DUPLIKAT (ANTI DOUBLE REVIEW)
        $sudahUlas = Ulasan::where('user_id', $user->id)
            ->where('produk_id', $request->produk_id)
            ->exists();

        if ($sudahUlas) {
            return back()->with('error','Kamu sudah pernah memberikan ulasan');
        }

        // 🔥 SIMPAN (AMAN WALAU PRODUK SUDAH DIHAPUS)
        Ulasan::create([
            'user_id' => $user->id,
            'produk_id' => $request->produk_id,
            'order_id' => $pesanan->order_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar
        ]);

        return back()->with('success','Ulasan berhasil dikirim');
    }
}
