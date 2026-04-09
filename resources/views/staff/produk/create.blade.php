<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk - Staff</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI';
        }

        body {
            background: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: #E5E7EB;
            padding: 15px 60px;
            display: flex;
            align-items: center;
            z-index: 9999;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-center {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 35px;
            flex: 1;
        }

        .nav-center a {
            color: #000;
            font-weight: 600;
            border-bottom: 1px solid #000;
            padding-bottom: 2px;
        }

        .logo-img {
            width: 40px;
            height: auto;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            color: #1E3A5F;
        }

        .nav-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn {
            background: #dc2626;
            color: white;
            padding: 10px 16px;
            border-radius: 20px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            font-weight: 700;
        }

        .content-wrapper {
            flex: 1;
            padding: 110px 24px 50px;
        }

        .create-board {
            width: min(1120px, 100%);
            margin: 0 auto;
            background: #fff;
            border: 1px solid #d5d5d5;
            border-radius: 24px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.16);
            overflow: hidden;
        }

        .board-header {
            background: #ededed;
            border-bottom: 1px solid #d9d9d9;
            text-align: center;
            padding: 16px 20px;
            font-size: 20px;
            font-weight: 800;
            color: #111;
        }

        .board-body {
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 0;
            min-height: 650px;
        }

        .upload-panel {
            padding: 46px 28px;
            border-right: 1px solid #d8d8d8;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }

        .upload-preview-box {
            width: 130px;
            height: 200px;
            border-radius: 24px;
            border: 1px solid #e5e7eb;
            background: #fff;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 14px;
        }

        .upload-placeholder {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #4b5563;
            font-size: 14px;
        }

        .upload-placeholder span {
            font-size: 28px;
        }

        #preview {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 16px;
            display: none;
        }

        .upload-trigger {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 7px 16px;
            border-radius: 999px;
            border: 1px solid #9ca3af;
            background: #fff;
            box-shadow: 0 3px 8px rgba(15, 23, 42, 0.14);
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            color: #111827;
        }

        .upload-trigger input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .form-panel {
            padding: 26px 26px 28px;
        }

        .alert-error,
        .alert-success {
            padding: 12px 14px;
            margin-bottom: 16px;
            border-radius: 12px;
            font-size: 14px;
        }

        .alert-error {
            background: #fee2e2;
            color: #b91c1c;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .product-form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .field-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .field-group label,
        .section-title,
        .static-label {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
        }

        .form-input,
        .form-select,
        .form-textarea {
            border: 1px solid #3f3f46;
            border-radius: 5px;
            padding: 8px 10px;
            font-size: 14px;
            background: #fff;
            color: #111827;
            outline: none;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #1E3A5F;
            box-shadow: 0 0 0 2px rgba(30, 58, 95, 0.12);
        }

        .input-lg {
            max-width: 520px;
        }

        .input-md {
            max-width: 430px;
        }

        .input-sm {
            max-width: 140px;
        }

        .select-sm {
            max-width: 140px;
        }

        .form-textarea {
            width: min(100%, 760px);
            min-height: 120px;
            resize: vertical;
        }

        .static-text {
            font-size: 15px;
            color: #111827;
            margin-bottom: 2px;
        }

        .section-block {
            margin-top: 2px;
        }

        .submit-btn {
            margin-top: 4px;
            width: min(100%, 255px);
            background: #1E3A5F;
            color: #fff;
            border: none;
            border-radius: 16px;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 800;
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.18);
            cursor: pointer;
        }

        .footer {
            background: #E5E7EB;
            padding: 40px 60px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: auto;
        }

        .footer-left p:last-child {
            margin-top: 25px;
            font-size: 13px;
            color: #555;
        }

        .footer-right {
            text-align: center;
            margin-top: 6.5px;
        }

        .footer-right h3 {
            margin-bottom: 14px;
            font-size: 24px;
            font-weight: 700;
        }

        .social-icons {
            display: flex;
            gap: 14px;
            justify-content: flex-end;
        }

        .social-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .social-icon img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        @media (max-width: 900px) {
            .navbar {
                padding: 15px 22px;
                flex-wrap: wrap;
                gap: 12px;
            }

            .nav-center {
                order: 3;
                width: 100%;
                flex-wrap: wrap;
                gap: 16px;
            }

            .content-wrapper {
                padding-top: 150px;
            }

            .board-body {
                grid-template-columns: 1fr;
            }

            .upload-panel {
                border-right: none;
                border-bottom: 1px solid #d8d8d8;
                padding-bottom: 30px;
            }

            .form-panel {
                padding: 22px 18px 26px;
            }

            .input-lg,
            .input-md,
            .input-sm,
            .select-sm,
            .form-textarea {
                max-width: 100%;
                width: 100%;
            }

            .footer {
                padding: 30px 22px;
                gap: 24px;
            }
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="nav-left">
        <img src="{{ asset('storage/Logo.png') }}" class="logo-img" alt="Logo BookHaven">
        <a href="{{ route('staff.dashboard') }}" class="logo">BookHaven</a>
    </div>

    <div class="nav-center">
        <a href="{{ route('staff.produk.index') }}">Manajemen Produk</a>
        <a href="{{ route('staff.pesanan.index') }}">Pesanan</a>
        <a href="{{ route('staff.transaksi.index') }}">Transaksi</a>
        <a href="{{ route('staff.laporan.index') }}">Laporan</a>
    </div>

    <div class="nav-right">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn">Logout</button>
        </form>
    </div>
</div>

<div class="content-wrapper">
    <div class="create-board">
        <div class="board-header">Buat Produk</div>

        <div class="board-body">
            <div class="upload-panel">
                <div class="upload-preview-box">
                    <div class="upload-placeholder" id="uploadPlaceholder">
                        <span>🖼️</span>
                        <p>Gambar</p>
                    </div>
                    <img id="preview" alt="Preview Gambar">
                </div>

                <label class="upload-trigger">
                    Upload 🖼️
                    <input type="file" name="gambar" id="gambar" form="produkForm" onchange="previewGambar(event)">
                </label>
            </div>

            <div class="form-panel">
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

                <form id="produkForm" action="{{ route('staff.produk.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" class="product-form">
                    @csrf

                    <div class="field-group">
                        <label for="nama">Judul</label>
                        <input class="form-input input-lg" type="text" name="nama" id="nama" value="{{ old('nama') }}">
                    </div>

                    <div class="field-group">
                        <label for="penulis">Penulis</label>
                        <input class="form-input input-lg" type="text" name="penulis" id="penulis" value="{{ old('penulis') }}">
                    </div>

                    <div class="field-group">
                        <label for="harga">Harga</label>
                        <input class="form-input input-md" type="number" name="harga" id="harga" value="{{ old('harga') }}">
                    </div>

                    <div class="field-group">
                        <label for="stok">Stok</label>
                        <input class="form-input input-sm" type="number" name="stok" id="stok" value="{{ old('stok') }}">
                    </div>

                    <div class="field-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-select select-sm" name="kategori_id" id="kategori">
                            <option value="">-- Pilih --</option>
                            @foreach($kategori as $k)
                                <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="section-block">
                        <div class="static-label">Toko : BookHaven</div>
                    </div>

                    <div class="field-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-textarea" name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="section-block">
                        <div class="section-title">Detail Produk</div>
                    </div>

                    <div class="section-block">
                        <div class="static-text"><strong>Penerbit :</strong> BookHaven</div>
                    </div>

                    <div class="field-group">
                        <label for="tanggal_terbit">Tanggal Terbit</label>
                        <input class="form-input input-md" type="date" name="tanggal_terbit" id="tanggal_terbit" value="{{ old('tanggal_terbit') }}">
                    </div>

                    <div class="field-group">
                        <label for="bahasa">Bahasa</label>
                        <input class="form-input input-sm" type="text" name="bahasa" id="bahasa" value="{{ old('bahasa') }}">
                    </div>

                    <div class="field-group">
                        <label for="jumlah_halaman">Halaman</label>
                        <input class="form-input input-sm" type="number" name="jumlah_halaman" id="jumlah_halaman" value="{{ old('jumlah_halaman') }}">
                    </div>

                    <button type="submit" class="submit-btn">Konfirmasi Buat</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="footer-left">
        <h3>Tentang BookHaven</h3>
        <p><a href="{{ route('staff.about') }}">Tentang Kami</a></p>
        <p><a href="https://wa.me/6281317705750" target="_blank">Hubungi Kami</a></p>
        <p class="copyright">
            &copy; 2026, BookHaven - Sistem Informasi E-Commerce Buku
        </p>
    </div>

    <div class="footer-right">
        <h3>Follow Us</h3>

        <div class="social-icons">
            <div class="social-icon">
                <a href="https://www.facebook.com/share/14YfqmAGjkC/" target="_blank">
                    <img src="{{ asset('storage/facebook.png') }}" alt="Facebook">
                </a>
            </div>

            <div class="social-icon">
                <a href="https://www.instagram.com/fattahian06?igsh=MzgwZmN2MGNqOGNs" target="_blank">
                    <img src="{{ asset('storage/instagram.jpg') }}" alt="Instagram">
                </a>
            </div>

            <div class="social-icon">
                <a href="https://youtube.com/@fattahian0611?si=M6IYal89_DCRV9Q7" target="_blank">
                    <img src="{{ asset('storage/youtube.png') }}" alt="YouTube">
                </a>
            </div>

            <div class="social-icon">
                <a href="https://tiktok.com/@fattah_ian_maulana" target="_blank">
                    <img src="{{ asset('storage/tiktok.avif') }}" alt="TikTok">
                </a>
            </div>
        </div>
    </div>
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
        alert("Semua field wajib diisi terlebih dahulu");
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
    const preview = document.getElementById('preview');
    const placeholder = document.getElementById('uploadPlaceholder');

    if(file){
        let allowed = ['image/jpeg','image/png','image/jpg'];

        if(!allowed.includes(file.type)){
            alert("File harus berupa gambar!");
            event.target.value = "";
            preview.style.display = 'none';
            preview.removeAttribute('src');
            placeholder.style.display = 'flex';
            return;
        }
    }

    if (!file) {
        preview.style.display = 'none';
        preview.removeAttribute('src');
        placeholder.style.display = 'flex';
        return;
    }

    const reader = new FileReader();
    reader.onload = function(){
        preview.src = reader.result;
        preview.style.display = 'block';
        placeholder.style.display = 'none';
    }
    reader.readAsDataURL(file);
}
</script>

</body>
</html>
