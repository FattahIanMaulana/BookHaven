<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk Staff - BookHaven</title>

    <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI'; }

    body { background:#fff; }

    a { text-decoration:none; color:#1E3A5F; }

    .navbar {
        position: fixed;
        width:100%;
        background:#E5E7EB;
        padding:15px 60px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        z-index:999;
    }

    .nav-left {
        display:flex;
        gap:20px;
        align-items:center;
    }

    .nav-right {
        display:flex;
        gap:10px;
        align-items:center;
    }

    .btn {
        background:#1E3A5F;
        color:white;
        padding:8px 15px;
        border-radius:8px;
        border:none;
        cursor:pointer;
    }

    .logo {
        font-weight:bold;
        font-size:18px;
    }

    .content-wrapper {
        padding-top:100px;
    }

    .container {
        max-width:900px;
        margin:auto;
        padding:20px;
    }

    .detail-box {
        display:flex;
        gap:20px;
        margin-bottom:20px;
    }

    .produk-img {
        width:250px;
        border-radius:10px;
    }

    .ulasan-box {
        border:1px solid #ddd;
        padding:10px;
        margin-top:10px;
        border-radius:8px;
    }

    .hidden { display:none; }

    .footer {
        background:#1E3A5F;
        color:white;
        text-align:center;
        padding:20px;
        margin-top:40px;
    }

    .footer a { color:white; }
    </style>
</head>

<body>

<div class="navbar">
    <div class="nav-left">
        <a href="{{ route('staff.dashboard') }}" class="logo">
            BookHaven (Staff)
        </a>

        <a href="{{ route('staff.produk.index') }}">Manajemen Produk</a>
        <a href="{{ route('staff.pesanan.index') }}">Pesanan</a>
        <a href="{{ route('staff.transaksi.index') }}">Transaksi</a>
        <a href="{{ route('staff.laporan.index') }}">Laporan</a>
    </div>

    <div class="nav-right">
        <div>Halo, {{ Auth::user()->name }}</div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn">Logout</button>
        </form>
    </div>
</div>

<div class="content-wrapper">
<div class="container">

<div class="detail-box">
    <img src="{{ $produk->gambar ? asset('storage/'.$produk->gambar) : asset('images/default.png') }}" class="produk-img">

    <div>
        <h1>{{ $produk->nama }}</h1>

        <p><b>Penulis:</b> {{ $produk->penulis }}</p>
        <p><b>Harga:</b> Rp{{ number_format($produk->harga,0,',','.') }}</p>
        <p><b>Stok:</b> {{ $produk->stok }}</p>

        <p><b>Bahasa:</b> {{ $produk->bahasa ?? '-' }}</p>

        <p><b>Halaman:</b> 
            {{ ($produk->jumlah_halaman !== null && $produk->jumlah_halaman != 0) 
                ? $produk->jumlah_halaman . ' halaman' 
                : '-' 
            }}
        </p>

        <p><b>Tanggal Terbit:</b> 
            {{ $produk->tanggal_terbit 
                ? \Carbon\Carbon::parse($produk->tanggal_terbit)->format('d M Y') 
                : '-' 
            }}
        </p>
    </div>
</div>

<p>{{ $produk->deskripsi }}</p>

<hr>

<h3>
⭐ {{ number_format($avgRating,1) }}/5 ({{ $totalUlasan }} ulasan)
</h3>

<hr>

<h3>Ulasan</h3>

<div id="ulasan-awal">
@forelse($ulasan->take(2) as $u)
<div class="ulasan-box">
    <b>{{ optional($u->user)->name ?? 'User tidak ditemukan' }}</b>
    <small>{{ $u->created_at->format('d M Y') }}</small><br>

    @for($i=1; $i<=5; $i++)
        @if($i <= $u->rating)
            ⭐
        @else
            ☆
        @endif
    @endfor

    <p>{{ $u->komentar }}</p>
</div>
@empty
<p>Belum ada ulasan</p>
@endforelse
</div>

<div id="ulasan-semua" class="hidden">
@foreach($ulasan as $u)
<div class="ulasan-box">
    <b>{{ optional($u->user)->name ?? 'User tidak ditemukan' }}</b>
    <small>{{ $u->created_at->format('d M Y') }}</small><br>

    @for($i=1; $i<=5; $i++)
        @if($i <= $u->rating)
            ⭐
        @else
            ☆
        @endif
    @endfor

    <p>{{ $u->komentar }}</p>
</div>
@endforeach
</div>

@if($ulasan->count() > 2)
    <button onclick="toggleUlasan()" id="btnUlasan" class="btn">
        Lihat Semua Ulasan
    </button>
@endif

</div>
</div>

<div class="footer">
    <a href="{{ route('staff.about') }}">About Us</a>
</div>

<script>
function toggleUlasan() {
    let awal = document.getElementById('ulasan-awal');
    let semua = document.getElementById('ulasan-semua');
    let btn = document.getElementById('btnUlasan');

    if (semua.classList.contains('hidden')) {
        semua.classList.remove('hidden');
        awal.style.display = 'none';
        btn.innerText = 'Tutup Ulasan';
    } else {
        semua.classList.add('hidden');
        awal.style.display = 'block';
        btn.innerText = 'Lihat Semua Ulasan';
    }
}
</script>

</body>
</html>
