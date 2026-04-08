<!DOCTYPE html>
<html>
<head>
    <title>Kategori Staff - BookHaven</title>

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

    .content-wrapper { padding-top:90px; }

    .section { padding:20px 60px; }

    .book-grid {
        display:grid;
        grid-template-columns:repeat(5,1fr);
        gap:20px;
    }

    .book-card {
        background:white;
        padding:12px;
        border-radius:12px;
        box-shadow:0 3px 8px rgba(0,0,0,0.08);
        transition:0.2s;
    }

    .book-card:hover {
        transform:scale(1.03);
    }

    .book-image img {
        width:100%;
        height:180px;
        object-fit:cover;
        border-radius:8px;
    }

    .title { font-weight:bold; margin-top:5px; }
    .author { font-size:13px; color:gray; }
    .price { font-weight:bold; color:#1E3A5F; }

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
        <!-- HOME STAFF -->
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

<!-- CONTENT -->
<div class="content-wrapper">

    <div class="section">
        <h2>
            Kategori: {{ $kategori->nama_kategori }}
        </h2>

        <div class="book-grid">

            @foreach($produk as $item)

            <!-- 🔥 FIX: PAKAI ROUTE STAFF -->
            <a href="{{ route('staff.produk.detail', $item->id) }}">

                <div class="book-card">

                    <div class="book-image">
                        <img src="{{ asset('storage/' . $item->gambar) }}">
                    </div>

                    <div class="title">{{ $item->nama }}</div>
                    <div class="author">{{ $item->penulis }}</div>

                    <div class="price">
                        Rp{{ number_format($item->harga,0,',','.') }}
                    </div>

                </div>

            </a>

            @endforeach

        </div>

    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    <a href="{{ route('staff.about') }}">About Us</a>
</div>

</body>
</html>
