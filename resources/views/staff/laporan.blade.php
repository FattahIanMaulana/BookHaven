<!DOCTYPE html>
<html>
<head>
    <title>Laporan Staff - BookHaven</title>

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

        .btn-nav {
            background:#1E3A5F;
            color:white;
            padding:8px 15px;
            border-radius:8px;
            border:none;
            cursor:pointer;
        }

        .content-wrapper {
            padding-top:100px;
            padding-left:30px;
            padding-right:30px;
        }

        .box {
            background:#f5f5f5;
            padding:15px;
            margin-bottom:10px;
        }

        .flex {
            display:flex;
            gap:10px;
            flex-wrap:wrap;
        }

        table {
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        table, th, td {
            border:1px solid #ddd;
        }

        th, td {
            padding:10px;
            text-align:left;
        }

        .btn {
            padding:8px 15px;
            background:#1E3A5F;
            color:white;
            border:none;
            cursor:pointer;
            border-radius:6px;
        }

        .badge-user-hapus {
            background:#6b7280;
            color:white;
            padding:2px 6px;
            font-size:12px;
            border-radius:6px;
            margin-left:5px;
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

<div class="navbar">
    <div class="nav-left">
        <a href="{{ route('staff.dashboard') }}">BookHaven (Staff)</a>
        <a href="{{ route('staff.produk.index') }}">Manajemen Produk</a>
        <a href="{{ route('staff.pesanan.index') }}">Pesanan</a>
        <a href="{{ route('staff.transaksi.index') }}">Transaksi</a>
        <a href="{{ route('staff.laporan.index') }}">Laporan</a>
    </div>

    <div class="nav-right">
        <div>Halo, {{ Auth::user()->name ?? 'User' }}</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn-nav">Logout</button>
        </form>
    </div>
</div>

<div class="content-wrapper">

<h1>Laporan</h1>

<form method="GET">
    Dari: <input type="date" name="from" value="{{ request('from') }}" required>
    Sampai: <input type="date" name="to" value="{{ request('to') }}" required>
    <button class="btn">Tampilkan</button>
</form>

<br>

@if(request('from') && request('to'))

<div class="flex">
    <div class="box">
        Total Transaksi: {{ $totalTransaksi ?? 0 }} ({{ $totalBarang ?? 0 }} barang)
    </div>

    <div class="box">
        Total Penjualan: Rp{{ number_format($totalPenjualan ?? 0,0,',','.') }}
    </div>

    <div class="box">
        Total Stok: {{ $totalStok ?? 0 }}
    </div>

    <div class="box">
        Tanggal:
        {{ request('from') }} s/d {{ request('to') }}
    </div>
</div>

<h3>Penjualan</h3>

<table>
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Produk</th>
    <th>Total Terjual</th>
</tr>

@php $no=1; $totalPendapatan=0; @endphp

@forelse($penjualan as $produk_id => $items)

@php $first = $items->first(); @endphp

@if($first)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ optional($first->created_at)->format('d M Y') }}</td>
    <td>{{ optional($first->produk)->nama ?? 'Produk dihapus' }}</td>
    <td>Rp{{ number_format($items->sum('total_harga'),0,',','.') }}</td>
</tr>

@php $totalPendapatan += $items->sum('total_harga'); @endphp
@endif

@empty
<tr>
    <td colspan="4">Tidak ada data penjualan</td>
</tr>
@endforelse

<tr>
    <td colspan="3"><b>Total Pendapatan</b></td>
    <td><b>Rp{{ number_format($totalPendapatan,0,',','.') }}</b></td>
</tr>
</table>

<h3>Transaksi</h3>

<table>
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>User</th>
    <th>Produk</th>
    <th>Jumlah</th>
    <th>Total Harga</th>
</tr>

@forelse($transaksi as $index => $t)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ optional($t->created_at)->format('d M Y') }}</td>
    <td>
        @if($t->user)
            {{ $t->user->name }}
        @else
            <span class="badge-user-hapus">User dihapus</span>
        @endif
    </td>
    <td>{{ optional($t->produk)->nama ?? 'Produk dihapus' }}</td>
    <td>{{ $t->jumlah ?? 0 }}</td>
    <td>Rp{{ number_format($t->total_harga ?? 0,0,',','.') }}</td>
</tr>
@empty
<tr>
    <td colspan="6">Tidak ada transaksi</td>
</tr>
@endforelse
</table>

<h3>Stok Produk</h3>

<table>
<tr>
    <th>No</th>
    <th>Produk</th>
    <th>Stok</th>
</tr>

@forelse($produk as $index => $p)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $p->nama ?? '-' }}</td>
    <td>{{ $p->stok ?? 0 }}</td>
</tr>
@empty
<tr>
    <td colspan="3">Tidak ada produk</td>
</tr>
@endforelse
</table>

@endif

</div>

<div class="footer">
    <a href="{{ route('staff.about') }}">About Us</a>
</div>

</body>
</html>
