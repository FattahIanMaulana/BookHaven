<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Akun - Admin</title>

    <style>
         *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI';
}

body{background:#fff;}
a{text-decoration:none;}

/* NAVBAR */
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

/* WRAPPER KIRI */
.nav-left{
    display:flex;
    align-items:center;
    gap:10px; /* jarak logo & teks */
}

.nav-center{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:28px;
    flex:1;
}

.nav-center a{
    color:#000;
    font-weight:600;
    border-bottom:1px solid #000;
    padding-bottom:2px;
}

/* GAMBAR LOGO */
.logo-img{
    width:40px; /* 🔥 atur size logo */
    height:auto;
}

/* TEXT LOGO */
.logo{
    font-size:20px;
    font-weight:700;
    color:#1E3A5F;
}

.btn-logout{
    background:#dc2626; /* 🔥 merah biar beda (logout vibe) */
    color:white;
}


   /* CENTER */
.nav-center{
    display:flex;
    align-items:center;
    gap:35px;
    flex:1;
    justify-content:center;
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
        padding-top:100px;
        padding-left:24px;
        padding-right:24px;
        padding-bottom:40px;
        width:min(1280px, 100%);
        margin:0 auto;
        flex:1;
    }

    .page-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:16px;
        margin-bottom:20px;
    }

    .account-search {
        width:min(420px, 100%);
        padding:12px 16px;
        border:1px solid #cfcfcf;
        border-radius:18px;
        font-size:14px;
        outline:none;
        box-shadow:0 2px 8px rgba(0,0,0,0.06);
        color:#111827;
        background:#fff;
    }

    .btn-primary {
        background:#1E3A5F;
        color:white;
        padding:10px 18px;
        border-radius:16px;
        font-size:14px;
        border:none;
        cursor:pointer;
        font-weight:700;
        display:inline-flex;
        align-items:center;
        justify-content:center;
    }

    .account-grid {
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:24px;
        align-items:start;
    }

    .account-panel {
        background:#fff;
        border:2px solid #d9d9d9;
        border-radius:22px;
        box-shadow:0 4px 14px rgba(0,0,0,0.10);
        overflow:hidden;
    }

    .panel-header {
        background:#ececec;
        padding:14px 18px;
        text-align:center;
        font-size:20px;
        font-weight:800;
        color:#161616;
    }

    .panel-body {
        background:#fff;
        padding:18px;
    }

    .table-wrap {
        overflow-x:auto;
    }

    table {
        width:100%;
        border-collapse:collapse;
        min-width:520px;
    }

    th, td {
        border:1px solid #d1d5db;
        padding:10px 12px;
        text-align:left;
        vertical-align:middle;
        font-size:14px;
    }

    th {
        background:#f8fafc;
        font-weight:700;
        color:#111827;
    }

    .action-cell {
        display:flex;
        gap:8px;
        flex-wrap:wrap;
    }

    form.inline-delete { display:inline; }
    form.inline-delete button {
        background:#DC2626;
        color:white;
        border:none;
        padding:10px 16px;
        border-radius:16px;
        cursor:pointer;
        font-weight:700;
        font-size:14px;
    }

    .alert-success {
        background:#D1FAE5;
        color:#065F46;
        padding:10px;
        border-radius:6px;
        margin-top:10px;
    }

    .alert-error {
        background:#FEE2E2;
        color:#991B1B;
        padding:10px;
        border-radius:6px;
        margin-top:10px;
    }

    .badge-role {
        padding:3px 8px;
        border-radius:6px;
        font-size:12px;
        color:white;
    }

    .role-admin { background:#7C3AED; }
    .role-staff { background:#2563EB; }
    .role-user { background:#059669; }

    .empty-row {
        color:#6b7280;
        text-align:center;
    }

    @media (max-width: 980px) {
        .content {
            padding-left:18px;
            padding-right:18px;
            padding-top:140px;
        }

        .page-header {
            flex-direction:column;
            align-items:flex-start;
        }

        .account-grid {
            grid-template-columns:1fr;
        }
    }





              /* FOOTER */
.footer{
    background:#E5E7EB;
    padding:40px 60px;
    display:flex;
    justify-content:space-between;
    align-items:flex-start; /* 🔥 naik dikit biar sejajar atas */
    flex-wrap:wrap;
}

/* LEFT */
.footer-left p:last-child{
    margin-top:25px;
    font-size:13px;
    color:#555;
}

/* RIGHT */
.footer-right{
    text-align:center;
    margin-top:6.5px; /* 🔥 ini yang bikin turun */
}

.footer-right h3{
    margin-bottom:14px;
    font-size:24px; /* 🔥 diperbesar */
    font-weight:700;
}

/* ICON WRAPPER */
.social-icons{
    display:flex;
    gap:14px; /* 🔥 agak lega */
    justify-content:flex-end;
}

/* BULAT PUTIH */
.social-icon{
    width:35px;  /* 🔥 diperbesar */
    height:35px;
    border-radius:50%;
    background:white; /* 🔥 jadi putih */
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    box-shadow:0 2px 6px rgba(0,0,0,0.1); /* 🔥 biar gak flat */
}

/* IMAGE DALAM ICON */
.social-icon img{
    width:40px;  /* 🔥 diperbesar */
    height:40px;
    object-fit:contain;
}

html, body{
    height:100%;
}

/* BODY JADI FLEX */
body{
    display:flex;
    flex-direction:column;
}

   
    </style>
</head>
<body>

    
<!-- NAVBAR -->
<div class="navbar">

    
    <div class="nav-left">
        <!-- LOGO GAMBAR -->
        <img src="{{ asset('storage/Logo.png') }}" class="logo-img">

        <!-- NAMA + LINK HOME -->
        <a href="{{ route('admin.dashboard') }}" class="logo">
            BookHaven
        </a>
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


<!-- CONTENT -->
<div class="content">

<div class="page-header">
    <input type="text" id="accountSearch" class="account-search" placeholder="Cari nama, email, atau role akun...">
    <a href="{{ route('admin.akun.create') }}" class="btn-primary">+ Tambah Akun</a>
</div>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert-error">
        {{ session('error') }}
    </div>
@endif

<div class="account-grid">
    <div class="account-panel">
        <div class="panel-header">Daftar Akun User</div>
        <div class="panel-body">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users->where('role','user')->values() as $i => $u)
                            <tr class="searchable-account" data-search="{{ strtolower($u->name.' '.$u->email.' user') }}">
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <div class="action-cell">
                                        <a href="{{ route('admin.akun.edit', $u->id) }}" class="btn-primary">Edit</a>
                                        <form action="{{ route('admin.akun.delete', $u->id) }}" method="POST" class="inline-delete" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button>Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-row">Belum ada akun user</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="account-panel">
        <div class="panel-header">Daftar Akun Staff & Admin</div>
        <div class="panel-body">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users->whereIn('role',['staff','admin'])->values() as $i => $u)
                            <tr class="searchable-account" data-search="{{ strtolower($u->name.' '.$u->email.' '.$u->role) }}">
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <span class="badge-role {{ $u->role == 'admin' ? 'role-admin' : ($u->role == 'staff' ? 'role-staff' : 'role-user') }}">
                                        {{ $u->role }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-cell">
                                        <a href="{{ route('admin.akun.edit', $u->id) }}" class="btn-primary">Edit</a>
                                        <form action="{{ route('admin.akun.delete', $u->id) }}" method="POST" class="inline-delete" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button>Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-row">Belum ada akun staff atau admin</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>

<script>
const accountSearch = document.getElementById('accountSearch');
const searchableAccounts = document.querySelectorAll('.searchable-account');

if (accountSearch) {
    accountSearch.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();

        searchableAccounts.forEach(item => {
            const text = ((item.dataset.search || '') + ' ' + (item.innerText || '')).toLowerCase();
            item.style.display = text.includes(keyword) ? '' : 'none';
        });
    });
}
</script>

<!-- FOOTER -->
<div class="footer">

    <!-- LEFT -->
    <div class="footer-left">
        <h3>Tentang BookHaven</h3>
        <p><a href="{{ route('admin.about') }}">Tentang Kami</a></p>
          <p><a href="https://wa.me/6281317705750" target="_blank">Hubungi Kami</a></p>
        <p class="copyright">
            © 2026, BookHaven - Sistem Informasi E-Commerce Buku
        </p>
    </div>

    <!-- RIGHT -->
    <div class="footer-right">
        <h3>Follow Us</h3>

        <div class="social-icons">

            <!-- TEMPLATE ICON (TINGGAL GANTI GAMBAR) -->
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
