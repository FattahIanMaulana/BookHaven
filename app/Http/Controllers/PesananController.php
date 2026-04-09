<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Transaksi;
use App\Models\Keranjang;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PesananController extends Controller
{
    // ================= USER =================
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user->alamat || !$user->no_telepon) {
            return back()->with('error', 'Lengkapi alamat dan no HP dulu di profile!');
        }

        $request->validate([
            'metode_pembayaran' => 'required',
            'metode_pengiriman' => 'required',
            'bukti_bayar' => 'required|image|max:2048'
        ]);

        $keranjang = Keranjang::with('produk')
            ->where('user_id', $user->id)
            ->where('is_checked', true)
            ->get();

        if ($keranjang->isEmpty()) {
            return back()->with('error', 'Pilih produk dulu');
        }

        foreach ($keranjang as $item) {
            if (!$item->produk || $item->jumlah > $item->produk->stok) {
                $nama = $item->produk?->nama ?? 'Produk tidak tersedia';
                return back()->with('error', 'Stok '.$nama.' tidak cukup!');
            }
        }

        $totalHarga = $keranjang->sum(function($item){
            return ($item->produk?->harga ?? 0) * $item->jumlah;
        });

        $bukti = $request->file('bukti_bayar')->store('bukti', 'public');

        $pesanan = Pesanan::create([
            'user_id' => $user->id,
            'total_harga' => $totalHarga,
            'status' => 'menunggu_verifikasi',
            'bukti_bayar' => $bukti,
            'metode_pembayaran' => $request->metode_pembayaran,
            'metode_pengiriman' => $request->metode_pengiriman,
            'alamat' => $user->alamat,
            'no_telepon' => $user->no_telepon
        ]);

        foreach ($keranjang as $item) {
            $harga = $item->produk?->harga ?? 0;

            PesananDetail::create([
                'order_id' => $pesanan->id,
                'produk_id' => $item->produk_id,
                'jumlah' => $item->jumlah,
                'subtotal' => $harga * $item->jumlah
            ]);

            Transaksi::create([
                'order_id' => $pesanan->id,
                'produk_id' => $item->produk_id,
                'staff_id' => null,
                'user_id' => $user->id,
                'jumlah' => $item->jumlah,
                'total_harga' => $harga * $item->jumlah
            ]);
        }

        Keranjang::where('user_id', $user->id)
            ->where('is_checked', true)
            ->delete();

        return redirect()->route('profile')->with('success', 'Pesanan berhasil dibuat');
    }

    // ================= STAFF / ADMIN =================
    public function index()
    {
        $pesanan = Pesanan::with(['user', 'detail.produk'])->latest()->get();

        if (Auth::user()->role === 'admin') {
            return view('admin.transaksi', compact('pesanan'));
        }

        return view('staff.pesanan', compact('pesanan'));
    }

    public function terima(Request $request, $id)
    {
        $request->validate(['no_resi' => 'required']);

        $pesanan = Pesanan::with('detail.produk')->findOrFail($id);

        if ($pesanan->status !== 'menunggu_verifikasi') {
            return back()->with('error', 'Pesanan tidak bisa diproses');
        }

        foreach ($pesanan->detail as $detail) {
            $produk = $detail->produk;

            if (!$produk || $produk->stok < $detail->jumlah) {
                $nama = $produk?->nama ?? 'Produk tidak tersedia';
                return back()->with('error', 'Stok '.$nama.' tidak cukup!');
            }

            $produk->stok -= $detail->jumlah;
            $produk->save();
        }

        $pesanan->update([
            'status' => 'diterima',
            'no_resi' => $request->no_resi,
            'diproses_oleh' => Auth::id()
        ]);

        return back()->with('success', 'Pesanan diterima');
    }

    public function tolak($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        if ($pesanan->status !== 'menunggu_verifikasi') {
            return back()->with('error', 'Pesanan tidak bisa diproses');
        }

        $pesanan->update([
            'status' => 'tidak_diproses',
            'diproses_oleh' => Auth::id()
        ]);

        return back()->with('success', 'Pesanan ditolak');
    }

    // ================= TRANSAKSI =================
    public function transaksi()
    {
        $transaksi = Transaksi::with(['produk','pesanan','user'])
            ->whereHas('pesanan', fn($q) => $q->where('status', 'diterima'))
            ->latest()
            ->get();

        $totalTransaksi = $transaksi->count();
        $totalPenjualan = $transaksi->sum('total_harga');

        if (Auth::user()->role === 'admin') {
            return view('admin.transaksi', compact('transaksi','totalTransaksi','totalPenjualan'));
        }

        return view('staff.transaksi', compact('transaksi','totalTransaksi','totalPenjualan'));
    }

    // ================= LAPORAN =================
    public function laporan(Request $request)
    {
        $transaksi = collect();
        $laporanDibatalkan = collect();
        $penjualan = collect();
        $produk = Produk::all();

        $totalTransaksi = 0;
        $totalPenjualan = 0;
        $totalBarang = 0;
        $totalStok = Produk::sum('stok');

        if ($request->from && $request->to) {
            $from = Carbon::parse($request->from)->startOfDay();
            $to   = Carbon::parse($request->to)->endOfDay();

            $transaksi = Transaksi::with(['produk','pesanan','user'])
                ->whereBetween('created_at', [$from, $to])
                ->whereHas('pesanan', fn($q) => $q->where('status', 'diterima'))
                ->latest()
                ->get();

            $laporanDibatalkan = Transaksi::with(['produk','pesanan','user'])
                ->whereBetween('created_at', [$from, $to])
                ->whereHas('pesanan', fn($q) => $q->whereIn('status', ['tidak_diproses', 'dibatalkan_sistem']))
                ->latest()
                ->get();

            $totalTransaksi = $transaksi->count();
            $totalPenjualan = $transaksi->sum('total_harga');
            $totalBarang = $transaksi->sum('jumlah');

            $penjualan = $transaksi->groupBy('produk_id');
        }

        if (Auth::user()->role === 'admin') {
            return view('admin.laporan', compact(
                'transaksi','laporanDibatalkan','penjualan','produk','totalTransaksi','totalPenjualan','totalBarang','totalStok'
            ));
        }

        return view('staff.laporan', compact(
            'transaksi','laporanDibatalkan','penjualan','produk','totalTransaksi','totalPenjualan','totalBarang','totalStok'
        ));
    }

    // ================= USER =================
    public function userPesanan()
    {
        $user = Auth::user();

        $pesanan = Pesanan::with('detail.produk')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $transaksi = Transaksi::with(['produk','pesanan'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $allKategori = Kategori::all();

        return view('user.profile', compact('pesanan','transaksi','allKategori'));
    }
}
