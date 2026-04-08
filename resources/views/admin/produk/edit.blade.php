<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk - Admin</title>

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

    /* CONTENT */
    .content-wrapper {
        padding-top:100px;
    }

    .container {
        max-width:700px;
        margin:auto;
        padding:20px;
    }

    input, select, textarea {
        width:100%;
        padding:10px;
        margin-top:5px;
        margin-bottom:15px;
        border-radius:6px;
        border:1px solid #ccc;
    }

    label {
        font-weight:bold;
    }

    #preview {
        margin-top:10px;
        border-radius:8px;
    }

    img.old-img {
        margin-top:10px;
        border-radius:8px;
    }

    .alert-error {
        background:#ffe5e5;
        color:red;
        padding:10px;
        margin-bottom:15px;
        border-radius:6px;
    }

    .alert-success {
        background:#e5ffe5;
        color:green;
        padding:10px;
        margin-bottom:15px;
        border-radius:6px;
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
            <button class="btn">Logout</button>
        </form>
    </div>

</div>

<!-- CONTENT -->
<div class="content-wrapper">
<div class="container">

<h1>Edit Produk</h1>

{{-- ALERT --}}
@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert-error">
        @foreach($errors->all() as $err)
            <div>{{ $err }}</div>
        @endforeach
    </div>
@endif

<form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    @csrf
    @method('PUT')

    <label>Nama Produk</label>
    <input type="text" name="nama" value="{{ $produk->nama }}">

    <label>Penulis</label>
    <input type="text" name="penulis" value="{{ $produk->penulis }}">

    <label>Harga</label>
    <input type="number" name="harga" value="{{ $produk->harga }}">

    <label>Stok</label>
    <input type="number" name="stok" value="{{ $produk->stok }}">

    <label>Kategori</label>
    <select name="kategori_id">
        @foreach($kategori as $k)
            <option value="{{ $k->id }}" {{ $produk->kategori_id == $k->id ? 'selected' : '' }}>
                {{ $k->nama_kategori }}
            </option>
        @endforeach
    </select>

    <label>Deskripsi</label>
    <textarea name="deskripsi">{{ $produk->deskripsi }}</textarea>

    <label>Tanggal Terbit</label>
    <input type="date" name="tanggal_terbit" value="{{ $produk->tanggal_terbit }}">

    <label>Bahasa</label>
    <input type="text" name="bahasa" value="{{ $produk->bahasa }}">

    <label>Jumlah Halaman</label>
    <input type="number" name="jumlah_halaman" value="{{ $produk->jumlah_halaman }}">

    <!-- GAMBAR LAMA -->
    <label>Gambar Sekarang</label>
    <img src="{{ asset('storage/' . $produk->gambar) }}" width="150" class="old-img">

    <!-- INPUT GAMBAR BARU -->
    <label>Ganti Gambar</label>
    <input type="file" name="gambar" onchange="previewGambar(event)">

    <!-- PREVIEW BARU -->
    <img id="preview" width="150">

    <br><br>

    <button type="submit" class="btn">Update</button>
</form>

</div>
</div>

<!-- FOOTER -->
<div class="footer">
    Admin Panel
</div>

<script>
function previewGambar(event) {
    const file = event.target.files[0];

    if (!file) return;

    if (!file.type.startsWith('image/')) {
        alert("File harus berupa gambar!");
        event.target.value = "";
        return;
    }

    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(file);
}

function validateForm() {
    const inputs = document.querySelectorAll('input[type="text"], input[type="number"], textarea');

    for (let input of inputs) {
        if (!input.value) {
            alert("Semua field wajib diisi!");
            return false;
        }
    }

    return true;
}
</script>

</body>
</html>
