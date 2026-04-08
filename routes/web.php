<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\AdminAkunController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| PUBLIC AREA
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', fn() => view('about'))->name('about');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| PROTECTED AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | ADMIN AREA (ADMIN ONLY)
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->middleware('role:admin')->group(function () {

        // ✅ DASHBOARD (PAKAI CONTROLLER YANG SAMA DENGAN STAFF)
        Route::get('/dashboard', [UserProdukController::class, 'index'])->name('admin.dashboard');

        // ✅ MANAJEMEN AKUN
        Route::get('/akun', [AdminAkunController::class, 'index'])->name('admin.akun.index');
        Route::get('/akun/create', [AdminAkunController::class, 'create'])->name('admin.akun.create');
        Route::post('/akun/store', [AdminAkunController::class, 'store'])->name('admin.akun.store');
        Route::get('/akun/edit/{id}', [AdminAkunController::class, 'edit'])->name('admin.akun.edit');
        Route::put('/akun/update/{id}', [AdminAkunController::class, 'update'])->name('admin.akun.update');
        Route::delete('/akun/delete/{id}', [AdminAkunController::class, 'destroy'])->name('admin.akun.delete');

        // ✅ MANAJEMEN PRODUK (GLOBAL)
        Route::get('/produk', [ProdukController::class, 'index'])->name('admin.produk.index');
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');
        Route::post('/produk', [ProdukController::class, 'store'])->name('admin.produk.store');
        Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
        Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('admin.produk.destroy');

        // ✅ DETAIL PRODUK
        Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('admin.produk.detail');

        // ✅ KATEGORI (UNTUK DASHBOARD)
        Route::get('/kategori/{id}', [UserProdukController::class, 'kategori'])->name('admin.kategori');

        // ✅ TRANSAKSI
        Route::get('/transaksi', [PesananController::class, 'transaksi'])->name('admin.transaksi');

        // ✅ LAPORAN
        Route::get('/laporan', [PesananController::class, 'laporan'])->name('admin.laporan');

        // ✅ ABOUT (FOOTER)
        Route::get('/about', fn() => view('admin.about'))->name('admin.about');
    });

    /*
    |--------------------------------------------------------------------------
    | STAFF AREA (STAFF + ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::prefix('staff')->middleware('role:staff')->group(function () {

        Route::get('/dashboard', [UserProdukController::class, 'index'])->name('staff.dashboard');
        Route::get('/staff/about', fn() => view('staff.about'))->name('staff.about');

        Route::get('/produk', [ProdukController::class, 'index'])->name('staff.produk.index');
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('staff.produk.create');
        Route::post('/produk', [ProdukController::class, 'store'])->name('staff.produk.store');
        Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('staff.produk.edit');
        Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('staff.produk.update');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('staff.produk.destroy');

        Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('staff.produk.detail');

        Route::get('/pesanan', [PesananController::class, 'index'])->name('staff.pesanan.index');
        Route::post('/pesanan/terima/{id}', [PesananController::class, 'terima'])->name('staff.pesanan.terima');
        Route::post('/pesanan/tolak/{id}', [PesananController::class, 'tolak'])->name('staff.pesanan.tolak');

        Route::get('/kategori/{id}', [UserProdukController::class, 'kategori'])->name('staff.kategori');

        Route::get('/transaksi', [PesananController::class, 'transaksi'])->name('staff.transaksi.index');
        Route::get('/laporan', [PesananController::class, 'laporan'])->name('staff.laporan.index');
    });

    /*
    |--------------------------------------------------------------------------
    | USER AREA (USER ONLY)
    |--------------------------------------------------------------------------
    */
    Route::prefix('user')->middleware('role:user')->group(function () {

        Route::get('/dashboard', [UserProdukController::class, 'index'])->name('user.dashboard');
        Route::get('/about', fn() => view('user.about'))->name('user.about');

        // PROFILE
        Route::get('/profile', [PesananController::class, 'userPesanan'])->name('profile');

        Route::post('/profile/update', function(Request $request){
            $request->validate([
                'name' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'no_telepon' => 'required|string|max:20'
            ]);

            Auth::user()->update([
                'name' => $request->name,
                'alamat' => $request->alamat,
                'no_telepon' => $request->no_telepon
            ]);

            return back()->with('success', 'Profile berhasil disimpan');
        })->name('profile.update');

        // PRODUK
        Route::get('/produk/{id}', [UserProdukController::class, 'detail'])->name('produk.detail');
        Route::get('/kategori/{id}', [UserProdukController::class, 'kategori'])->name('kategori');
        Route::get('/search', [UserProdukController::class, 'search'])->name('search');
        Route::post('/ulasan/store', [UlasanController::class, 'store'])->name('ulasan.store');

        // KERANJANG
        Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
        Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
        Route::post('/keranjang/tambah-jumlah/{id}', [KeranjangController::class, 'tambahJumlah'])->name('keranjang.tambahJumlah');
        Route::post('/keranjang/kurang-jumlah/{id}', [KeranjangController::class, 'kurangJumlah'])->name('keranjang.kurangJumlah');
        Route::post('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
        Route::post('/keranjang/check/{id}', [KeranjangController::class, 'toggleCheck'])->name('keranjang.toggle');

        // CHECKOUT
        Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
        Route::post('/checkout/proses', [KeranjangController::class, 'prosesCheckout'])->name('checkout.proses');
        Route::post('/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');
    });

});
