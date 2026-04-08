<!DOCTYPE html>
<html>
<head>
    <title>Tambah Akun - Admin</title>

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

        .nav-left { display:flex; gap:20px; align-items:center; }
        .nav-right { display:flex; gap:10px; align-items:center; }

        .logo {
            font-weight:bold;
            font-size:18px;
        }

        .btn {
            background:#1E3A5F;
            color:white;
            padding:8px 15px;
            border-radius:8px;
            border:none;
            cursor:pointer;
        }

        .content {
            padding-top:100px;
            max-width:600px;
            margin:auto;
        }

        input, select {
            padding:6px;
            width:100%;
        }

        .error-box {
            background:#FEE2E2;
            color:#991B1B;
            padding:10px;
            border-radius:6px;
            margin-bottom:15px;
        }

        .note {
            font-size:12px;
            color:#555;
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

<!-- ✅ NAVBAR ADMIN -->
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
<div class="content">

<h1>Tambah Akun</h1>

<a href="{{ route('admin.akun.index') }}">← Kembali</a>

{{-- ERROR --}}
@if($errors->any())
    <div class="error-box">
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.akun.store') }}">
    @csrf

    {{-- NAMA --}}
    <label>Nama</label><br>
    <input type="text" name="name" value="{{ old('name') }}" required minlength="3">
    <div class="note">Minimal 3 karakter</div>
    <br><br>

    {{-- EMAIL --}}
    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}" required
           pattern="[a-zA-Z0-9]{5,}@gmail\.com">
    <div class="note">Gunakan email valid (minimal 5 karakter sebelum @gmail.com)</div>
    <br><br>

    {{-- PASSWORD --}}
    <label>Password (min 6 karakter, tanpa spasi)</label><br>
    <input type="password" name="password" minlength="6" required pattern="\S{6,}">
    <div class="note">Tidak boleh ada spasi</div>
    <br><br>

    {{-- KONFIRMASI PASSWORD --}}
    <label>Konfirmasi Password</label><br>
    <input type="password" name="password_confirmation" minlength="6" required pattern="\S{6,}">
    <br><br>

    {{-- ROLE --}}
    <label>Role</label><br>
    <select name="role" required>
        <option value="">-- Pilih Role --</option>
        <option value="user" {{ old('role')=='user'?'selected':'' }}>User</option>
        <option value="staff" {{ old('role')=='staff'?'selected':'' }}>Staff</option>
        <option value="admin" {{ old('role')=='admin'?'selected':'' }}>Admin</option>
    </select>

    <div class="note">
        ⚠️ Role admin punya akses penuh
    </div>

    <br><br>

    <button type="submit" class="btn">Buat Akun</button>
</form>

</div>

<!-- ✅ FOOTER -->
<div class="footer">
    <a href="{{ route('admin.about') }}">About Us</a>
</div>

</body>
</html>
