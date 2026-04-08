<!DOCTYPE html>
<html>
<head>
    <title>About Staff - BookHaven</title>

    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Segoe UI'; }

        body { background:#fff; }

        a { text-decoration:none; color:#1E3A5F; }

        /* NAVBAR */
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

        /* CONTENT */
        .content-wrapper {
            padding-top:100px;
            padding-left:60px;
            padding-right:60px;
        }

        .section {
            margin-bottom:30px;
        }

        h1 {
            margin-bottom:10px;
        }

        h2 {
            margin-bottom:10px;
            color:#1E3A5F;
        }

        p {
            line-height:1.6;
            margin-bottom:10px;
        }

        .card {
            background:#f9f9f9;
            padding:20px;
            border-radius:10px;
            margin-bottom:20px;
            box-shadow:0 3px 8px rgba(0,0,0,0.05);
        }

        /* FOOTER */
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

<!-- CONTENT -->
<div class="content-wrapper">

    <h1>About BookHaven (Staff)</h1>

    <div class="section card">
        <h2>Tentang Sistem</h2>
        <p>
            BookHaven adalah sistem manajemen toko buku berbasis web yang digunakan untuk
            mengelola produk, pesanan, transaksi, dan laporan secara terpusat.
        </p>

        <p>
            Sistem ini dirancang untuk membantu staff dalam mengontrol seluruh aktivitas toko
            secara efisien dan real-time.
        </p>
    </div>

    <div class="section card">
        <h2>Fitur Utama</h2>
        <p>• Manajemen Produk (Tambah, Edit, Hapus)</p>
        <p>• Pengelolaan Pesanan Customer</p>
        <p>• Tracking Transaksi</p>
        <p>• Laporan Penjualan</p>
    </div>

    <div class="section card">
        <h2>Tujuan Sistem</h2>
        <p>
            Sistem ini dibuat untuk meningkatkan efisiensi operasional toko buku,
            meminimalisir kesalahan manual, dan memberikan data yang akurat untuk
            pengambilan keputusan.
        </p>
    </div>

    <div class="section card">
        <h2>Developer</h2>
        <p>
            Project ini dikembangkan sebagai bagian dari tugas akhir / UKOM
            dengan tujuan membangun sistem e-commerce berbasis Laravel.
        </p>
    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    <a href="{{ route('staff.about') }}">About Us</a>
</div>

</body>
</html>
