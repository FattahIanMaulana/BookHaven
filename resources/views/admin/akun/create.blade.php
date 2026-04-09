<!DOCTYPE html>
<html>
<head>
    <title>Tambah Akun - Admin</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI';
        }

        body{background:#fff;}
        a{text-decoration:none;}

        .navbar{
            position:fixed;
            top:0;
            width:100%;
            background:#E5E7EB;
            padding:15px 60px;
            display:flex;
            align-items:center;
            z-index:9999;
        }

        .nav-left{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .nav-center{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:35px;
            flex:1;
        }

        .nav-center a{
            color:#000;
            font-weight:600;
            border-bottom:1px solid #000;
            padding-bottom:2px;
        }

        .logo-img{
            width:40px;
            height:auto;
        }

        .logo{
            font-size:20px;
            font-weight:700;
            color:#1E3A5F;
        }

        .nav-right {
            display:flex;
            gap:10px;
            align-items:center;
        }

        .btn {
            background:#dc2626;
            color:white;
            padding:10px 16px;
            border-radius:20px;
            font-size:14px;
            border:none;
            cursor:pointer;
            font-weight:700;
        }

        .content {
            flex:1;
            padding:120px 24px 48px;
            display:flex;
            justify-content:center;
            align-items:flex-start;
        }

        .account-card {
            width:min(650px, 100%);
            background:#fff;
            border:1px solid #d4d4d4;
            border-radius:24px;
            box-shadow:0 5px 14px rgba(15, 23, 42, 0.18);
            overflow:hidden;
        }

        .account-card-header {
            background:#ececec;
            padding:12px 20px;
            text-align:center;
            font-size:18px;
            font-weight:800;
            color:#111;
        }

        .account-card-body {
            padding:26px 26px 30px;
            display:flex;
            flex-direction:column;
            align-items:center;
        }

        .back-link {
            align-self:flex-start;
            margin-bottom:16px;
            color:#1E3A5F;
            font-size:14px;
            font-weight:700;
        }

        .avatar-shell {
            width:124px;
            height:124px;
            border:1.5px solid #9ca3af;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            margin-bottom:24px;
        }

        .avatar-icon {
            position:relative;
            width:64px;
            height:72px;
        }

        .avatar-icon::before {
            content:'';
            position:absolute;
            top:0;
            left:50%;
            transform:translateX(-50%);
            width:40px;
            height:40px;
            border-radius:50%;
            background:#231f20;
        }

        .avatar-icon::after {
            content:'';
            position:absolute;
            bottom:0;
            left:50%;
            transform:translateX(-50%);
            width:64px;
            height:38px;
            border-radius:999px 999px 18px 18px;
            background:#231f20;
        }

        .form-stack {
            width:min(365px, 100%);
            display:flex;
            flex-direction:column;
            align-items:center;
            gap:16px;
        }

        .field-wrap {
            width:100%;
        }

        .form-input,
        .form-select {
            width:100%;
            padding:13px 16px;
            border:1.5px solid #3f3f46;
            border-radius:15px;
            font-size:14px;
            color:#111827;
            background:#f8f8f8;
            outline:none;
        }

        .form-input:focus,
        .form-select:focus {
            border-color:#1E3A5F;
            box-shadow:0 0 0 2px rgba(30, 58, 95, 0.10);
            background:#fff;
        }

        .role-wrap {
            width:auto;
            min-width:124px;
        }

        .form-select {
            appearance:none;
            padding-right:42px;
            background-image:linear-gradient(45deg, transparent 50%, #6b7280 50%), linear-gradient(135deg, #6b7280 50%, transparent 50%);
            background-position:calc(100% - 18px) calc(50% - 3px), calc(100% - 10px) calc(50% - 3px);
            background-size:8px 8px, 8px 8px;
            background-repeat:no-repeat;
        }

        .error-box {
            background:#FEE2E2;
            color:#991B1B;
            padding:10px;
            border-radius:6px;
            margin-bottom:16px;
            width:min(365px, 100%);
        }

        .note {
            font-size:12px;
            color:#555;
            margin-top:6px;
            padding-left:4px;
        }

        .submit-btn {
            margin-top:10px;
            min-width:220px;
            background:#1E3A5F;
            color:white;
            border:none;
            padding:14px 18px;
            border-radius:14px;
            font-size:16px;
            font-weight:800;
            box-shadow:0 4px 10px rgba(0,0,0,0.18);
            cursor:pointer;
        }

        .footer{
            background:#E5E7EB;
            padding:40px 60px;
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            flex-wrap:wrap;
        }

        .footer-left p:last-child{
            margin-top:25px;
            font-size:13px;
            color:#555;
        }

        .footer-right{
            text-align:center;
            margin-top:6.5px;
        }

        .footer-right h3{
            margin-bottom:14px;
            font-size:24px;
            font-weight:700;
        }

        .social-icons{
            display:flex;
            gap:14px;
            justify-content:flex-end;
        }

        .social-icon{
            width:35px;
            height:35px;
            border-radius:50%;
            background:white;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            box-shadow:0 2px 6px rgba(0,0,0,0.1);
        }

        .social-icon img{
            width:40px;
            height:40px;
            object-fit:contain;
        }

        html, body{
            height:100%;
        }

        body{
            display:flex;
            flex-direction:column;
        }

        @media (max-width: 900px) {
            .navbar {
                padding:15px 22px;
                flex-wrap:wrap;
                gap:12px;
            }

            .nav-center {
                order:3;
                width:100%;
                flex-wrap:wrap;
                gap:16px;
            }

            .content {
                padding-top:150px;
            }

            .footer {
                padding:30px 22px;
                gap:24px;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="nav-left">
        <img src="{{ asset('storage/Logo.png') }}" class="logo-img">
        <a href="{{ route('admin.dashboard') }}" class="logo">BookHaven</a>
    </div>

    <div class="nav-center">
        <a href="{{ route('admin.produk.index') }}">Manajemen Produk</a>
        <a href="{{ route('admin.akun.index') }}">Manajemen Akun</a>
        <a href="{{ route('admin.transaksi') }}">Transaksi</a>
        <a href="{{ route('admin.laporan') }}">Laporan</a>
    </div>

    <div class="nav-right">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn">Logout</button>
        </form>
    </div>
</div>

<div class="content">
    <div class="account-card">
        <div class="account-card-header">Buat Akun</div>

        <div class="account-card-body">
            <a href="{{ route('admin.akun.index') }}" class="back-link">&larr; Kembali</a>

            <div class="avatar-shell">
                <div class="avatar-icon"></div>
            </div>

            @if($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.akun.store') }}" class="form-stack">
                @csrf

                <div class="field-wrap">
                    <input class="form-input" type="email" name="email" value="{{ old('email') }}" required pattern="[a-zA-Z0-9]{5,}@gmail\.com" placeholder="Masukkan Email">
                    <div class="note">Gunakan email valid, minimal 5 karakter sebelum @gmail.com</div>
                </div>

                <div class="field-wrap">
                    <input class="form-input" type="text" name="name" value="{{ old('name') }}" required minlength="3" placeholder="Masukkan Username">
                    <div class="note">Minimal 3 karakter</div>
                </div>

                <div class="field-wrap">
                    <input class="form-input" type="password" name="password" minlength="6" required pattern="\S{6,}" placeholder="Masukkan Password">
                    <div class="note">Minimal 6 karakter dan tidak boleh ada spasi</div>
                </div>

                <div class="field-wrap">
                    <input class="form-input" type="password" name="password_confirmation" minlength="6" required pattern="\S{6,}" placeholder="Konfirmasi Password">
                </div>

                <div class="field-wrap role-wrap">
                    <select class="form-select" name="role" required>
                        <option value="">Pilih Role</option>
                        <option value="user" {{ old('role')=='user'?'selected':'' }}>User</option>
                        <option value="staff" {{ old('role')=='staff'?'selected':'' }}>Staff</option>
                        <option value="admin" {{ old('role')=='admin'?'selected':'' }}>Admin</option>
                    </select>
                    <div class="note">Role admin punya akses penuh</div>
                </div>

                <button type="submit" class="submit-btn">Konfirmasi Buat</button>
            </form>
        </div>
    </div>
</div>

<div class="footer">
    <div class="footer-left">
        <h3>Tentang BookHaven</h3>
        <p><a href="{{ route('admin.about') }}">Tentang Kami</a></p>
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
                    <img src="{{ asset('storage/facebook.png') }}">
                </a>
            </div>

            <div class="social-icon">
                 <a href="https://www.instagram.com/fattahian06?igsh=MzgwZmN2MGNqOGNs" target="_blank">
                    <img src="{{ asset('storage/instagram.jpg') }}">
                </a>
            </div>

            <div class="social-icon">
                <a href="https://youtube.com/@fattahian0611?si=M6IYal89_DCRV9Q7" target="_blank">
                    <img src="{{ asset('storage/youtube.png') }}">
                </a>
            </div>

            <div class="social-icon">
                <a href="tiktok.com/@fattah_ian_maulana" target="_blank">
                    <img src="{{ asset('storage/tiktok.avif') }}">
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
