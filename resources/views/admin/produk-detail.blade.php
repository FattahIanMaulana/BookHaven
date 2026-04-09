<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk Admin - BookHaven</title>

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

    .content-wrapper {
        padding-top:100px;
    }

    .container {
        max-width:900px;
        margin:auto;
        padding:20px;
    }

    .detail-box {
        display:flex;
        gap:20px;
        margin-bottom:20px;
    }

    .produk-img {
        width:250px;
        border-radius:10px;
    }

    .ulasan-box {
        border:1px solid #ddd;
        padding:10px;
        margin-top:10px;
        border-radius:8px;
    }

    .hidden { display:none; }

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
<div class="content-wrapper">
<div class="container">

<div class="detail-box">
    <img src="{{ $produk->gambar ? asset('storage/'.$produk->gambar) : asset('images/default.png') }}" class="produk-img">

    <div>
        <h1>{{ $produk->nama }}</h1>

        <p><b>Penulis:</b> {{ $produk->penulis }}</p>
        <p><b>Harga:</b> Rp{{ number_format($produk->harga,0,',','.') }}</p>
        <p><b>Stok:</b> {{ $produk->stok }}</p>

        <p><b>Bahasa:</b> {{ $produk->bahasa ?? '-' }}</p>

        <p><b>Halaman:</b> 
            {{ ($produk->jumlah_halaman !== null && $produk->jumlah_halaman != 0) 
                ? $produk->jumlah_halaman . ' halaman' 
                : '-' 
            }}
        </p>

        <p><b>Tanggal Terbit:</b> 
            {{ $produk->tanggal_terbit 
                ? \Carbon\Carbon::parse($produk->tanggal_terbit)->format('d M Y') 
                : '-' 
            }}
        </p>
    </div>
</div>

<p>{{ $produk->deskripsi }}</p>

<hr>

<h3>
⭐ {{ number_format($avgRating,1) }}/5 ({{ $totalUlasan }} ulasan)
</h3>

<hr>

<h3>Ulasan</h3>

<div id="ulasan-awal">
@forelse($ulasan->take(2) as $u)
<div class="ulasan-box">
    <b>{{ optional($u->user)->name ?? 'User tidak ditemukan' }}</b>
    <small>{{ $u->created_at->format('d M Y') }}</small><br>

    @for($i=1; $i<=5; $i++)
        @if($i <= $u->rating)
            ⭐
        @else
            ☆
        @endif
    @endfor

    <p>{{ $u->komentar }}</p>
</div>
@empty
<p>Belum ada ulasan</p>
@endforelse
</div>

<div id="ulasan-semua" class="hidden">
@foreach($ulasan as $u)
<div class="ulasan-box">
    <b>{{ optional($u->user)->name ?? 'User tidak ditemukan' }}</b>
    <small>{{ $u->created_at->format('d M Y') }}</small><br>

    @for($i=1; $i<=5; $i++)
        @if($i <= $u->rating)
            ⭐
        @else
            ☆
        @endif
    @endfor

    <p>{{ $u->komentar }}</p>
</div>
@endforeach
</div>

@if($ulasan->count() > 2)
    <button onclick="toggleUlasan()" id="btnUlasan" class="btn">
        Lihat Semua Ulasan
    </button>
@endif

</div>
</div>

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

<script>
function toggleUlasan() {
    let awal = document.getElementById('ulasan-awal');
    let semua = document.getElementById('ulasan-semua');
    let btn = document.getElementById('btnUlasan');

    if (semua.classList.contains('hidden')) {
        semua.classList.remove('hidden');
        awal.style.display = 'none';
        btn.innerText = 'Tutup Ulasan';
    } else {
        semua.classList.add('hidden');
        awal.style.display = 'block';
        btn.innerText = 'Lihat Semua Ulasan';
    }
}
</script>

</body>
</html>
