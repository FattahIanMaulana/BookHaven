<!DOCTYPE html>
<html>
<head>
    <title>About Admin - BookHaven</title>

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
        font-size:14px;
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

    .section {
        margin-bottom:30px;
    }

    .title {
        font-size:28px;
        font-weight:bold;
        margin-bottom:10px;
    }

    .desc {
        font-size:16px;
        color:#444;
        line-height:1.6;
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

<!-- NAVBAR -->
<div class="navbar">

    <div class="nav-left">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            BookHaven (Admin)
        </a>

        <a href="{{ route('admin.akun.index') }}">Manajemen Akun</a>
        <a href="{{ route('admin.produk.index') }}">Manajemen Produk</a>
        <a href="{{ route('admin.transaksi') }}">Transaksi</a>
        <a href="{{ route('admin.laporan') }}">Laporan</a>
    </div>

    <div class="nav-right">
        <div>Halo, {{ Auth::user()->name }}</div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn">Logout</button>
        </form>
    </div>

</div>

<!-- CONTENT -->
<div class="content-wrapper">

    <div class="section">
        <div class="title">About BookHaven (Admin)</div>

        <div class="desc">
            BookHaven adalah platform penjualan buku berbasis web yang dirancang untuk memudahkan pengelolaan produk, transaksi, dan laporan penjualan secara terstruktur.
            <br><br>
            Sebagai admin, Anda memiliki akses penuh untuk:
            <ul style="margin-top:10px; margin-left:20px;">
                <li>Mengelola akun pengguna dan staff</li>
                <li>Mengelola seluruh produk secara global</li>
                <li>Melihat dan memantau transaksi</li>
                <li>Mengakses laporan penjualan</li>
            </ul>
            <br>
            Sistem ini dibuat untuk mendukung efisiensi operasional dan pengelolaan data dalam satu dashboard terpusat.
        </div>
    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    <a href="{{ route('admin.about') }}">About Us</a>
</div>

</body>
</html>
