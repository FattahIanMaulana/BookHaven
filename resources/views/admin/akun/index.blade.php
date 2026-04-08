<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Akun - Admin</title>

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

    .btn {
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

    .content { padding-top:100px; max-width:1000px; margin:auto; }

    table {
        width:100%;
        border-collapse:collapse;
        margin-top:20px;
    }

    th, td {
        border:1px solid #ccc;
        padding:10px;
        text-align:left;
    }

    .footer {
        background:#1E3A5F;
        color:white;
        text-align:center;
        padding:20px;
        margin-top:40px;
    }

    form.inline-delete { display:inline; }
    form.inline-delete button {
        background:#DC2626;
        color:white;
        border:none;
        padding:5px 10px;
        border-radius:5px;
        cursor:pointer;
    }

    h2 { margin-top:30px; }

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
    </style>
</head>
<body>

<!-- ✅ NAVBAR ADMIN (FIX KONSISTEN) -->
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

<h1>Manajemen Akun</h1>

<a href="{{ route('admin.akun.create') }}" class="btn">+ Tambah Akun</a>

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

<h2>Akun User</h2>
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
@foreach($users->where('role','user')->values() as $i => $u)
<tr>
<td>{{ $i+1 }}</td>
<td>{{ $u->name }}</td>
<td>{{ $u->email }}</td>
<td>
<a href="{{ route('admin.akun.edit', $u->id) }}" class="btn" style="background:#2563EB;">Edit</a>

<form action="{{ route('admin.akun.delete', $u->id) }}" method="POST" class="inline-delete" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
@csrf
@method('DELETE')
<button>Hapus</button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>

<h2>Akun Staff & Admin</h2>
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
@foreach($users->whereIn('role',['staff','admin'])->values() as $i => $u)
<tr>
<td>{{ $i+1 }}</td>
<td>{{ $u->name }}</td>
<td>{{ $u->email }}</td>
<td>
    <span class="badge-role 
        {{ $u->role == 'admin' ? 'role-admin' : ($u->role == 'staff' ? 'role-staff' : 'role-user') }}">
        {{ $u->role }}
    </span>
</td>
<td>

<a href="{{ route('admin.akun.edit', $u->id) }}" class="btn" style="background:#2563EB;">Edit</a>

<form action="{{ route('admin.akun.delete', $u->id) }}" method="POST" class="inline-delete" onsubmit="return confirm('Yakin ingin menghapus akun ini?');">
@csrf
@method('DELETE')
<button>Hapus</button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>

</div>

<!-- ✅ FOOTER ADMIN (FIX KONSISTEN) -->
<div class="footer">
    <a href="{{ route('admin.about') }}">About Us</a>
</div>

</body>
</html>
