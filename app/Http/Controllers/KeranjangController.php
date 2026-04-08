<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    // =========================
    // 🔥 LIST KERANJANG
    // =========================
    public function index()
    {
        $keranjang = Keranjang::with('produk')
            ->where('user_id', Auth::id())
            ->get();

        $totalHarga = 0;
        $totalItem = 0;

        foreach ($keranjang as $item) {

            // 🔥 FIX: PRODUK DIHAPUS / TIDAK ADA
            if (!$item->produk || $item->produk->deleted_at) {
                $item->is_checked = false;
                $item->save();
                continue;
            }

            if ($item->is_checked) {
                $totalHarga += $item->produk->harga * $item->jumlah;
                $totalItem += $item->jumlah;
            }
        }

        $allKategori = Kategori::all();

        return view('user.keranjang', compact(
            'keranjang',
            'totalHarga',
            'totalItem',
            'allKategori'
        ));
    }

    // =========================
    // 🔥 TAMBAH KE KERANJANG
    // =========================
    public function tambah($id)
    {
        $produk = Produk::findOrFail($id);

        // 🔥 FIX: CEGAH PRODUK SOFT DELETE
        if ($produk->deleted_at) {
            return back()->with('error', 'Produk sudah tidak tersedia');
        }

        $keranjang = Keranjang::where('user_id', Auth::id())
            ->where('produk_id', $id)
            ->first();

        if ($keranjang) {

            if ($keranjang->jumlah >= $produk->stok) {
                return back()->with('error', 'Stok tidak cukup');
            }

            $keranjang->jumlah += 1;
            $keranjang->save();

        } else {

            if ($produk->stok < 1) {
                return back()->with('error', 'Stok habis');
            }

            Keranjang::create([
                'user_id' => Auth::id(),
                'produk_id' => $id,
                'jumlah' => 1,
                'is_checked' => true
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang 🛒');
    }

    // =========================
    // 🔥 TAMBAH JUMLAH
    // =========================
    public function tambahJumlah($id)
    {
        $item = Keranjang::with('produk')->findOrFail($id);

        // 🔥 FIX: PRODUK HILANG / DIHAPUS
        if (!$item->produk || $item->produk->deleted_at) {
            return back()->with('error', 'Produk sudah tidak tersedia');
        }

        if ($item->jumlah < $item->produk->stok) {
            $item->jumlah += 1;
            $item->save();
        }

        return back();
    }

    // =========================
    // 🔥 KURANG JUMLAH
    // =========================
    public function kurangJumlah($id)
    {
        $item = Keranjang::findOrFail($id);

        if ($item->jumlah > 1) {
            $item->jumlah -= 1;
            $item->save();
        }

        return back();
    }

    // =========================
    // 🔥 HAPUS
    // =========================
    public function hapus($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->delete();

        return back();
    }

    // =========================
    // 🔥 CHECKLIST
    // =========================
    public function toggleCheck($id)
    {
        $item = Keranjang::with('produk')->findOrFail($id);

        // 🔥 FIX: PRODUK DIHAPUS GAK BOLEH DICHECK
        if (!$item->produk || $item->produk->deleted_at) {
            return back()->with('error', 'Produk sudah tidak tersedia');
        }

        $item->is_checked = !$item->is_checked;
        $item->save();

        return back();
    }

    // =========================
    // 🔥 CHECKOUT PAGE
    // =========================
    public function checkout()
    {
        $keranjang = Keranjang::with('produk')
            ->where('user_id', Auth::id())
            ->where('is_checked', true)
            ->get();

        if ($keranjang->isEmpty()) {
            return redirect()->route('keranjang.index')
                ->with('error', 'Pilih minimal 1 produk dulu');
        }

        foreach ($keranjang as $item) {

            // 🔥 FIX: PRODUK DIHAPUS
            if (!$item->produk || $item->produk->deleted_at) {
                return redirect()->route('keranjang.index')
                    ->with('error', 'Ada produk yang sudah dihapus');
            }

            if ($item->jumlah > $item->produk->stok) {
                return redirect()->route('keranjang.index')
                    ->with('error', 'Stok '.$item->produk->nama.' tidak cukup');
            }
        }

        $totalHarga = 0;
        foreach ($keranjang as $item) {
            $totalHarga += $item->produk->harga * $item->jumlah;
        }

        $allKategori = Kategori::all();
        $user = Auth::user();

        return view('user.checkout', compact(
            'keranjang',
            'totalHarga',
            'allKategori',
            'user'
        ));
    }

    // =========================
    // 🔥 PROSES CHECKOUT
    // =========================
    public function prosesCheckout(Request $request)
    {
        $user = Auth::user();

        if (!$user->alamat || !$user->no_telepon) {
            return redirect()->route('profile')
                ->with('error', 'Lengkapi profile dulu');
        }

        $keranjang = Keranjang::with('produk')
            ->where('user_id', Auth::id())
            ->where('is_checked', true)
            ->get();

        if ($keranjang->isEmpty()) {
            return redirect()->route('keranjang.index')
                ->with('error', 'Tidak ada produk dipilih');
        }

        foreach ($keranjang as $item) {

            // 🔥 FIX: PRODUK DIHAPUS
            if (!$item->produk || $item->produk->deleted_at) {
                return redirect()->route('keranjang.index')
                    ->with('error', 'Ada produk yang sudah dihapus');
            }

            if ($item->jumlah > $item->produk->stok) {
                return redirect()->route('keranjang.index')
                    ->with('error', 'Stok '.$item->produk->nama.' tidak cukup');
            }
        }

        $request->validate([
            'metode_pembayaran' => 'required',
            'metode_pengiriman' => 'required'
        ]);

        session([
            'checkout_metode_pembayaran' => $request->metode_pembayaran,
            'checkout_metode_pengiriman' => $request->metode_pengiriman
        ]);

        return back()->with('show_popup', true);
    }
}
