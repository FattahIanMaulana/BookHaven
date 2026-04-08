<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Staff - BookHaven</title>

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

        .btn-nav {
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
            padding-left:60px;
            padding-right:60px;
        }

        h1 {
            margin-bottom:20px;
        }

        .card {
            border:1px solid #ddd;
            padding:15px;
            margin-bottom:15px;
            display:flex;
            justify-content:space-between;
            border-radius:10px;
        }

        .left {
            display:flex;
            gap:15px;
        }

        img {
            width:80px;
            border-radius:8px;
        }

        .label-hapus {
            color:red;
            font-size:13px;
            margin-left:5px;
        }

        .summary {
            margin-top:30px;
            padding:20px;
            border:1px solid #ddd;
            border-radius:10px;
            background:#f9f9f9;
        }

        .empty {
            color:gray;
        }

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
            <button class="btn-nav">Logout</button>
        </form>
    </div>

</div>

<div class="content-wrapper">

<h1>Riwayat Transaksi</h1>

@forelse($transaksi as $t)

<div class="card">
    <div class="left">

        <!-- GAMBAR PRODUK -->
        @if($t->produk)
            <img src="{{ asset('storage/'.$t->produk->gambar) }}">
        @else
            <img src="https://via.placeholder.com/80x80?text=No+Image">
        @endif

        <div>

            <!-- NAMA PRODUK -->
            @if($t->produk && $t->produk->deleted_at)
                <h3>
                    {{ $t->produk->nama }} 
                    <span class="label-hapus">(Produk dihapus)</span>
                </h3>
            @elseif($t->produk)
                <h3>{{ $t->produk->nama }}</h3>
            @else
                <h3>Produk tidak tersedia</h3>
            @endif

            <p>Jumlah: {{ $t->jumlah }}</p>
            <p>Total: Rp{{ number_format($t->total_harga,0,',','.') }}</p>

            <!-- FIX USER -->
            <p>
    User: 
    @if($t->user)
        {{ $t->user->name }}
        @if($t->user->deleted_at)
            <span class="label-hapus">User dihapus</span>
        @endif
    @else
        <span class="label-hapus">User dihapus</span>
    @endif
</p>

            <p>Tanggal: {{ $t->created_at->format('d M Y H:i') }}</p>
        </div>

    </div>
</div>

@empty
<p class="empty">Belum ada transaksi</p>
@endforelse

<div class="summary">
    <p><b>Total Transaksi:</b> {{ $totalTransaksi }}</p>
    <p><b>Total Penjualan:</b> Rp{{ number_format($totalPenjualan,0,',','.') }}</p>
</div>

</div>

<div class="footer">
    <a href="{{ route('staff.about') }}">About Us</a>
</div>

</body>
</html>
