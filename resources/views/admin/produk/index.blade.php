<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Produk - Admin | BookHaven</title>

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

        .top-bar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }

        .btn {
            background:#1E3A5F;
            color:white;
            padding:8px 15px;
            border-radius:8px;
            border:none;
            cursor:pointer;
        }

        .card {
            display: flex;
            gap: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            align-items: center;
            transition:0.2s;
        }

        .card:hover {
            transform:scale(1.01);
            box-shadow:0 3px 8px rgba(0,0,0,0.08);
        }

        img {
            width: 100px;
            height: 130px;
            object-fit: cover;
            border-radius:8px;
        }

        .info h3 {
            margin-bottom:5px;
        }

        .actions {
            margin-top:10px;
            display:flex;
            gap:10px;
        }

        .btn-danger {
            background:#dc2626;
            color:white;
            border:none;
            padding:6px 12px;
            border-radius:6px;
            cursor:pointer;
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
            <button class="btn-nav">Logout</button>
        </form>
    </div>

</div>

<!-- CONTENT -->
<div class="content-wrapper">

    <div class="top-bar">
        <h1>Manajemen Produk</h1>

        <a href="{{ route('admin.produk.create') }}">
            <button class="btn">+ Tambah Produk</button>
        </a>
    </div>

    @forelse($produk as $item)
    <div class="card">

        <!-- GAMBAR -->
        <img src="{{ asset('storage/' . $item->gambar) }}">

        <!-- INFO -->
        <div class="info">
            <h3>{{ $item->nama }}</h3>
            <p><b>Tanggal Terbit:</b> {{ $item->tanggal_terbit }}</p>
            <p><b>Harga:</b> Rp{{ number_format($item->harga,0,',','.') }}</p>
            <p><b>Stok:</b> {{ $item->stok }}</p>

            <div class="actions">
                <a href="{{ route('admin.produk.edit', $item->id) }}">
                    <button class="btn">Edit</button>
                </a>

                <form action="{{ route('admin.produk.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-danger" onclick="return confirm('Yakin hapus produk ini?')">
                        Hapus
                    </button>
                </form>
            </div>
        </div>

    </div>
    @empty
        <p>Belum ada produk</p>
    @endforelse

</div>

<!-- FOOTER -->
<div class="footer">
    <a href="{{ route('admin.about') }}">About Us</a>
</div>

</body>
</html>
