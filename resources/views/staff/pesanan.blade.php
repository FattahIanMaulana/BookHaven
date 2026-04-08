<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Staff - BookHaven</title>

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
            padding-left:60px;
            padding-right:60px;
        }

        .card {
            border:1px solid #ddd;
            padding:15px;
            margin-bottom:15px;
            display:flex;
            justify-content:space-between;
        }

        .left { display:flex; gap:15px; }

        img { width:80px; cursor:pointer; }
        .bukti { width:100px; }

        .produk-item {
            display:flex;
            gap:10px;
            margin-bottom:10px;
        }

        .success { color:green; font-weight:bold; }
        .danger { color:red; font-weight:bold; }
        .badge-hapus { background:red; color:white; padding:2px 6px; font-size:12px; border-radius:6px; margin-left:5px; }
        .badge-user-hapus { background:#6b7280; color:white; padding:2px 6px; font-size:12px; border-radius:6px; margin-left:5px; }

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

{{-- ================= PESANAN MASUK ================= --}}
<h1>Pesanan Masuk</h1>

@forelse($pesanan->where('status','menunggu_verifikasi') as $p)
<div class="card">

<div class="left">
<div>

@forelse($p->detail ?? [] as $d)
    <div class="produk-item">

        @if($d->produk && $d->produk->gambar)
            <img src="{{ asset('storage/'.$d->produk->gambar) }}" onclick="preview(this.src)">
        @else
            <img src="https://via.placeholder.com/80">
        @endif

        <div>
            <h4>
                {{ $d->produk->nama ?? 'Produk sudah dihapus' }}
                @if(!$d->produk || ($d->produk && $d->produk->deleted_at))
                    <span class="badge-hapus">Dihapus</span>
                @endif
            </h4>
            <p>Jumlah: {{ $d->jumlah }}</p>
        </div>
    </div>
@empty
    <p>Detail produk tidak tersedia</p>
@endforelse

<hr>

<p><b>Total Barang:</b> {{ $p->detail?->sum('jumlah') ?? 0 }}</p>

<p>
    User: 
    @if($p->user)
        {{ $p->user->name }}
        @if($p->user->deleted_at)
            <span class="badge-user-hapus">User dihapus</span>
        @endif
    @else
        <span class="badge-user-hapus">User dihapus</span>
    @endif
</p>

<p>
    Email: 
    @if($p->user)
        {{ $p->user->email }}
    @else
        -
    @endif
</p>

<p><b>Tanggal:</b> {{ $p->created_at->format('d M Y H:i') }} ({{ $p->created_at->diffForHumans() }})</p>
<p>Alamat: {{ $p->alamat ?? '-' }}</p>
<p>No HP: {{ $p->no_telepon ?? '-' }}</p>
<p>Kurir: {{ $p->metode_pengiriman ?? '-' }}</p>

<form action="{{ route('staff.pesanan.terima', $p->id) }}" method="POST">
    @csrf
    <input type="text" name="no_resi" placeholder="No Resi" required>
    <br>
    <button>Terima</button>
</form>

<form action="{{ route('staff.pesanan.tolak', $p->id) }}" method="POST">
    @csrf
    <button>Tolak</button>
</form>

</div>
</div>

@if($p->bukti_bayar)
<img class="bukti" src="{{ asset('storage/'.$p->bukti_bayar) }}" onclick="preview(this.src)">
@endif

</div>
@empty
<p>Tidak ada pesanan masuk</p>
@endforelse

<hr>

{{-- ================= DIPROSES ================= --}}
<h1>Pesanan Diproses</h1>

@forelse($pesanan->where('status','diterima') as $p)
<div class="card">

<div class="left">
<div>

@foreach($p->detail ?? [] as $d)
<div class="produk-item">

    @if($d->produk && $d->produk->gambar)
        <img src="{{ asset('storage/'.$d->produk->gambar) }}" onclick="preview(this.src)">
    @else
        <img src="https://via.placeholder.com/80">
    @endif

    <div>
        <h4>
            {{ $d->produk->nama ?? 'Produk sudah dihapus' }}
            @if(!$d->produk || ($d->produk && $d->produk->deleted_at))
                <span class="badge-hapus">Dihapus</span>
            @endif
        </h4>
        <p>Jumlah: {{ $d->jumlah }}</p>
    </div>
</div>
@endforeach

<hr>

<p><b>Total Barang:</b> {{ $p->detail?->sum('jumlah') ?? 0 }}</p>

<p>
    User: 
    @if($p->user)
        {{ $p->user->name }}
        @if($p->user->deleted_at)
            <span class="badge-user-hapus">User dihapus</span>
        @endif
    @else
        <span class="badge-user-hapus">User dihapus</span>
    @endif
</p>

<p>
    Email: 
    @if($p->user)
        {{ $p->user->email }}
    @else
        -
    @endif
</p>

<p><b>Tanggal:</b> {{ $p->created_at->format('d M Y H:i') }} ({{ $p->created_at->diffForHumans() }})</p>
<p>Alamat: {{ $p->alamat ?? '-' }}</p>
<p>No HP: {{ $p->no_telepon ?? '-' }}</p>
<p>Kurir: {{ $p->metode_pengiriman ?? '-' }}</p>
<p>No Resi: {{ $p->no_resi ?? '-' }}</p>

<p class="success">✔ Pesanan Diterima</p>

</div>
</div>

@if($p->bukti_bayar)
<img class="bukti" src="{{ asset('storage/'.$p->bukti_bayar) }}" onclick="preview(this.src)">
@endif

</div>
@empty
<p>Tidak ada pesanan diproses</p>
@endforelse

<hr>

{{-- ================= DITOLAK ================= --}}
<h1>Pesanan Ditolak</h1>

@forelse($pesanan->where('status','tidak_diproses') as $p)
<div class="card">

<div class="left">
<div>

@foreach($p->detail ?? [] as $d)
<div class="produk-item">

    @if($d->produk && $d->produk->gambar)
        <img src="{{ asset('storage/'.$d->produk->gambar) }}" onclick="preview(this.src)">
    @else
        <img src="https://via.placeholder.com/80">
    @endif

    <div>
        <h4>
            {{ $d->produk->nama ?? 'Produk sudah dihapus' }}
            @if(!$d->produk || ($d->produk && $d->produk->deleted_at))
                <span class="badge-hapus">Dihapus</span>
            @endif
        </h4>
        <p>Jumlah: {{ $d->jumlah }}</p>
    </div>
</div>
@endforeach

<hr>

<p><b>Total Barang:</b> {{ $p->detail?->sum('jumlah') ?? 0 }}</p>

<p>
    User: 
    @if($p->user)
        {{ $p->user->name }}
        @if($p->user->deleted_at)
            <span class="badge-user-hapus">User dihapus</span>
        @endif
    @else
        <span class="badge-user-hapus">User dihapus</span>
    @endif
</p>

<p>
    Email: 
    @if($p->user)
        {{ $p->user->email }}
    @else
        -
    @endif
</p>

<p><b>Tanggal:</b> {{ $p->created_at->format('d M Y H:i') }} ({{ $p->created_at->diffForHumans() }})</p>
<p>Alamat: {{ $p->alamat ?? '-' }}</p>
<p>No HP: {{ $p->no_telepon ?? '-' }}</p>
<p>Kurir: {{ $p->metode_pengiriman ?? '-' }}</p>

<p class="danger">✖ Pesanan Ditolak</p>

</div>
</div>

@if($p->bukti_bayar)
<img class="bukti" src="{{ asset('storage/'.$p->bukti_bayar) }}" onclick="preview(this.src)">
@endif

</div>
@empty
<p>Tidak ada pesanan ditolak</p>
@endforelse

<hr>

<h1>Total Pesanan Diproses</h1>
<p>{{ $pesanan->where('status','diterima')->count() }} Pesanan</p>

</div>

<div class="footer">
    <a href="{{ route('staff.about') }}">About Us</a>
</div>

<div id="popup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:black;">
    <img id="imgPreview" style="display:block; margin:auto; max-width:80%; margin-top:50px;">
</div>

<script>
function preview(src){
    if(!src) return;
    document.getElementById('popup').style.display='block';
    document.getElementById('imgPreview').src = src;
}

document.getElementById('popup').onclick = function(){
    this.style.display='none';
}
</script>

</body>
</html>
