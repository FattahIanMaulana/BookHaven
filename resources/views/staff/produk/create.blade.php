<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - Staff</title>

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
<div class="container">

<h1>Tambah Produk</h1>

{{-- 🔥 ALERT --}}
@if(session('error'))
    <div class="alert-error">
        {{ session('error') }}
    </div>
@endif

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

<form action="{{ route('staff.produk.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    @csrf

    <label>Nama Produk</label>
    <input type="text" name="nama" id="nama">

    <label>Penulis</label>
    <input type="text" name="penulis" id="penulis">

    <label>Harga</label>
    <input type="number" name="harga" id="harga">

    <label>Stok</label>
    <input type="number" name="stok" id="stok">

    <label>Kategori</label>
    <select name="kategori_id" id="kategori">
        <option value="">-- Pilih Kategori --</option>
        @foreach($kategori as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
        @endforeach
    </select>

    <label>Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi"></textarea>

    <label>Tanggal Terbit</label>
    <input type="date" name="tanggal_terbit">

    <label>Bahasa</label>
    <input type="text" name="bahasa">

    <label>Jumlah Halaman</label>
    <input type="number" name="jumlah_halaman">

    <label>Gambar</label>
    <input type="file" name="gambar" id="gambar" onchange="previewGambar(event)">

    <!-- PREVIEW -->
    <img id="preview" width="150">

    <br><br>

    <button type="submit" class="btn">Simpan</button>
</form>

</div>
</div>

<!-- FOOTER -->
<div class="footer">
    <a href="{{ route('staff.about') }}">About Us</a>
</div>

<script>
function validateForm(){
    let nama = document.getElementById('nama').value;
    let penulis = document.getElementById('penulis').value;
    let harga = document.getElementById('harga').value;
    let stok = document.getElementById('stok').value;
    let kategori = document.getElementById('kategori').value;
    let deskripsi = document.getElementById('deskripsi').value;
    let gambar = document.getElementById('gambar').files[0];

    if(!nama || !penulis || !harga || !stok || !kategori || !deskripsi || !gambar){
        alert("Semua field wajib diisi bro 😅");
        return false;
    }

    let allowed = ['image/jpeg','image/png','image/jpg'];
    if(gambar && !allowed.includes(gambar.type)){
        alert("File harus berupa gambar (JPG/PNG)!");
        return false;
    }

    return true;
}

function previewGambar(event) {
    const file = event.target.files[0];

    if(file){
        let allowed = ['image/jpeg','image/png','image/jpg'];

        if(!allowed.includes(file.type)){
            alert("File harus berupa gambar!");
            event.target.value = "";
            return;
        }
    }

    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    }
    reader.readAsDataURL(file);
}
</script>

</body>
</html>
