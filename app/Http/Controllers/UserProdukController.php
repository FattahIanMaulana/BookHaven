<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Ulasan;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserProdukController extends Controller
{
    /**
     * Dashboard view
     */
    public function index()
    {
        $kategori = Kategori::with(['produk' => function($query) {
            $query->latest()->take(6);
        }])->get();

        $allKategori = Kategori::all();

        // CEK ROLE DENGAN AMAN
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return view('admin.dashboard', compact('kategori','allKategori'));
            }

            if ($role === 'staff') {
                return view('staff.dashboard', compact('kategori','allKategori'));
            }
        }

        return view('user.dashboard', compact('kategori','allKategori'));
    }

    /**
     * Produk detail view
     */
    public function detail($id)
    {
        try {
            $produk = Produk::with(['kategori', 'ulasan.user'])->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Produk tidak ditemukan');
        }

        $ulasan = Ulasan::with('user')
            ->where('produk_id', $id)
            ->latest()
            ->get();

        $avgRating = $ulasan->avg('rating') ?? 0;
        $totalUlasan = $ulasan->count();

        $allKategori = Kategori::all();

        $bolehUlas = false;

        if (Auth::check()) {
            $pernahBeli = PesananDetail::where('produk_id', $id)
                ->whereHas('pesanan', function($q){
                    $q->where('user_id', Auth::id())
                      ->where('status', 'diterima');
                })
                ->exists();

            $sudahUlas = Ulasan::where('user_id', Auth::id())
                ->where('produk_id', $id)
                ->exists();

            $bolehUlas = $pernahBeli && !$sudahUlas;
        }

        // ✅ FIX ROLE
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return view('admin.produk-detail', compact(
                    'produk',
                    'ulasan',
                    'avgRating',
                    'totalUlasan',
                    'allKategori'
                ));
            }

            if ($role === 'staff') {
                return view('staff.produk-detail', compact(
                    'produk',
                    'ulasan',
                    'avgRating',
                    'totalUlasan',
                    'allKategori'
                ));
            }
        }

        return view('user.produk-detail', compact(
            'produk',
            'ulasan',
            'avgRating',
            'totalUlasan',
            'bolehUlas',
            'allKategori'
        ));
    }

    /**
     * Produk by kategori
     */
    public function kategori($id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $produk = Produk::where('kategori_id', $id)
            ->latest()
            ->get();

        $allKategori = Kategori::all();

        // ✅ FIX ROLE
        if (Auth::check()) {
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return view('admin.kategori', compact('kategori','produk','allKategori'));
            }

            if ($role === 'staff') {
                return view('staff.kategori', compact('kategori','produk','allKategori'));
            }
        }

        return view('user.kategori', compact('kategori','produk','allKategori'));
    }

    /**
     * Search produk
     */
    public function search(Request $request)
    {
        $keyword = $request->q ?? '';

        $produk = Produk::where('nama', 'like', "%$keyword%")
            ->orWhere('penulis', 'like', "%$keyword%")
            ->latest()
            ->get();

        $allKategori = Kategori::all();

        return view('user.search', compact('produk','keyword','allKategori'));
    }
}
