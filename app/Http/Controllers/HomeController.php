<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        // 🔹 Semua kategori untuk dropdown di navbar
        $allKategori = Kategori::all();

        // 🔹 Ambil 5 kategori pertama untuk ditampilkan di homepage
        $kategoris = Kategori::take(5)->get();

        // 🔹 Ambil 5 produk per kategori
        $kategoriWithProduk = $kategoris->map(function($kategori){
            $kategori->produk = Produk::where('kategori_id', $kategori->id)->take(6)->get();
            return $kategori;
        });

        // 🔹 Kirim data ke view
        return view('homepage', [
            'kategori' => $kategoriWithProduk, // Section kategori & produk
            'allKategori' => $allKategori      // Dropdown kategori navbar
        ]);
    }
}
