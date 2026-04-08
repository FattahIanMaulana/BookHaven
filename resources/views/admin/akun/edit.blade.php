<!DOCTYPE html>
<html>
<head>
    <title>Edit Akun - Admin</title>

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

        .alert-error {
            background:#FEE2E2;
            color:#991B1B;
            padding:10px;
            border-radius:6px;
            margin-bottom:10px;
        }

        .alert-success {
            background:#D1FAE5;
            color:#065F46;
            padding:10px;
            border-radius:6px;
            margin-bottom:10px;
        }

        .alert-warning {
            background:#FEF3C7;
            color:#92400E;
            padding:10px;
            border-radius:6px;
            margin-bottom:10px;
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

<h1>Edit Akun</h1>

<a href="{{ route('admin.akun.index') }}">← Kembali</a>

{{-- ERROR VALIDASI --}}
@if($errors->any())
    <div class="alert-error">
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- ERROR CUSTOM --}}
@if(session('error'))
    <div class="alert-error">
        {{ session('error') }}
    </div>
@endif

{{-- SUCCESS --}}
@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- WARNING --}}
@if(Auth::id() === $user->id)
    <div class="alert-warning">
        ⚠️ Anda sedang mengedit akun sendiri. Role tidak bisa diubah.
    </div>
@endif

<form method="POST" action="{{ route('admin.akun.update', $user->id) }}">
    @csrf
    @method('PUT')

    {{-- NAMA --}}
    <label>Nama</label><br>
    <input type="text" name="name" value="{{ old('name', $user->name) }}" required minlength="3"><br><br>

    {{-- EMAIL --}}
    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
           pattern="[a-zA-Z0-9]{5,}@gmail\.com"><br><br>

    {{-- PASSWORD --}}
    <label>Password (opsional)</label><br>
    <input type="password" name="password" minlength="6" pattern="\S{6,}"><br><br>

    {{-- KONFIRMASI --}}
    <label>Konfirmasi Password</label><br>
    <input type="password" name="password_confirmation" minlength="6" pattern="\S{6,}"><br><br>

    {{-- ROLE --}}
    <label>Role</label><br>
    <select name="role" required
        @if(Auth::id() === $user->id) disabled @endif
    >
        <option value="user" {{ old('role', $user->role)=='user'?'selected':'' }}>User</option>
        <option value="staff" {{ old('role', $user->role)=='staff'?'selected':'' }}>Staff</option>
        <option value="admin" {{ old('role', $user->role)=='admin'?'selected':'' }}>Admin</option>
    </select><br><br>

    {{-- FIX hidden --}}
    @if(Auth::id() === $user->id)
        <input type="hidden" name="role" value="{{ $user->role }}">
    @endif

    <button type="submit" class="btn">Update</button>
</form>

</div>

<!-- ✅ FOOTER -->
<div class="footer">
    <a href="{{ route('admin.about') }}">About Us</a>
</div>

</body>
</html>
