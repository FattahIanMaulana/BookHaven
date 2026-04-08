<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use App\Models\Ulasan;

class ProdukController extends Controller
{
    // 🔥 HELPER VIEW (BIAR GAK NGACO & AMAN)
    private function viewByRole($adminView, $staffView, $data = [])
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view($adminView, $data);
        }

        return view($staffView, $data);
    }

    // 🔥 INDEX
    public function index()
    {
        if (!Auth::check()) return redirect()->route('login');
        if (!in_array(Auth::user()->role, ['staff','admin'])) abort(403);

        $produk = Produk::latest()->get();

        return $this->viewByRole(
            'admin.produk.index',
            'staff.produk.index',
            compact('produk')
        );
    }

    // 🔥 CREATE
    public function create()
    {
        if (!Auth::check()) return redirect()->route('login');
        if (!in_array(Auth::user()->role, ['staff','admin'])) abort(403);

        $kategori = Kategori::all();

        return $this->viewByRole(
            'admin.produk.create',
            'staff.produk.create',
            compact('kategori')
        );
    }

    // 🔥 STORE
    public function store(Request $request)
    {
        if (!Auth::check()) return redirect()->route('login');
        if (!in_array(Auth::user()->role, ['staff','admin'])) abort(403);

        $request->validate([
            'nama' => 'required|string|max:100',
            'penulis' => 'required|string|max:100',
            'harga' => 'required|numeric|max:10000000',
            'stok' => 'required|integer|max:10000',
            'kategori_id' => 'required',
            'deskripsi' => 'required|string|max:1000',
            'tanggal_terbit' => 'required|date',
            'bahasa' => 'required|string|max:50',
            'jumlah_halaman' => 'required|integer|max:5000',
            'gambar' => 'required|image'
        ]);

        $gambar = $request->file('gambar')->store('produk', 'public');

        Produk::create([
            'staff_id' => Auth::id(),
            'kategori_id' => $request->kategori_id,
            'nama' => $request->nama,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'toko' => 'BrookHaven',
            'deskripsi' => $request->deskripsi,
            'tanggal_terbit' => $request->tanggal_terbit,
            'bahasa' => $request->bahasa,
            'jumlah_halaman' => $request->jumlah_halaman,
            'gambar' => $gambar,
        ]);

        // 🔥 redirect sesuai role
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
        }

        return redirect()->route('staff.produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // 🔥 EDIT
    public function edit($id)
    {
        if (!Auth::check()) return redirect()->route('login');
        if (!in_array(Auth::user()->role, ['staff','admin'])) abort(403);

        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();

        return $this->viewByRole(
            'admin.produk.edit',
            'staff.produk.edit',
            compact('produk', 'kategori')
        );
    }

    // 🔥 UPDATE
    public function update(Request $request, $id)
    {
        if (!Auth::check()) return redirect()->route('login');
        if (!in_array(Auth::user()->role, ['staff','admin'])) abort(403);

        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:100',
            'penulis' => 'required|string|max:100',
            'harga' => 'required|numeric|max:10000000',
            'stok' => 'required|integer|max:10000',
            'kategori_id' => 'required',
            'deskripsi' => 'required|string|max:1000',
            'tanggal_terbit' => 'required|date',
            'bahasa' => 'required|string|max:50',
            'jumlah_halaman' => 'required|integer|max:5000',
            'gambar' => 'nullable|image'
        ]);

        $data = $request->only([
            'kategori_id','nama','penulis','harga','stok',
            'deskripsi','tanggal_terbit','bahasa','jumlah_halaman'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($data);

        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diupdate');
        }

        return redirect()->route('staff.produk.index')->with('success', 'Produk berhasil diupdate');
    }

    // 🔥 DELETE
    public function destroy($id)
    {
        if (!Auth::check()) return redirect()->route('login');
        if (!in_array(Auth::user()->role, ['staff','admin'])) abort(403);

        $produk = Produk::findOrFail($id);
        $produk->delete();

        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus');
        }

        return redirect()->route('staff.produk.index')->with('success', 'Produk berhasil dihapus');
    }

    // 🔥 DETAIL
    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        $ulasan = Ulasan::with('user')
            ->where('produk_id', $id)
            ->latest()
            ->limit(20)
            ->get();

        $totalUlasan = $ulasan->count();
        $avgRating = $totalUlasan > 0 ? $ulasan->avg('rating') : 0;

        return $this->viewByRole(
            'admin.produk-detail',
            'staff.produk-detail',
            compact('produk','ulasan','totalUlasan','avgRating')
        );
    }
}
