<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin - BookHaven</title>

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

         /* CONTENT */
.content-wrapper{
    padding-top:110px;
}

/* SECTION */
.section{
    padding:30px 60px;
}

/* HEADER */
.section-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:18px;
}

.section-header h2{
    font-size:28.5px;
    font-weight:700;
    color:#1E1E1E;
}

/* LIHAT SEMUA */
.lihat-semua{
    font-size:20px;
    color:#9CA3AF;
    text-decoration:none;
    transition:0.2s;
}

.lihat-semua:hover{
    color:#6B7280;
}

/* GRID */
.book-grid{
    display:grid;
    grid-template-columns:repeat(6,1fr);
    gap:20px;
    position:relative;
    overflow:visible;
}

/* EFEK KABUT */
.book-grid::after{
    content:"";
    position:absolute;
    top:0;
    right:0;
    width:120px;
    height:100%;
    background:linear-gradient(
        to right,
        rgba(255,255,255,0),
        rgba(255,255,255,0.7),
        white
    );
    pointer-events:none;
}

/* CARD KE-6 FADE */
.book-grid .book-link:nth-child(6){
    opacity:0.4;
    pointer-events:none;
}

/* LINK RESET */
.book-link{
    text-decoration:none;
    color:inherit;
}

/* CARD */
.book-card{
    background:white;
    border-radius:16px;
    padding:12px;
    box-shadow:0 8px 12px rgba(0,0,0,0.18);
    height:380px;
    display:flex;
    flex-direction:column;
    cursor:pointer;
    transition:0.2s;
}

.book-card:hover{
    transform:translateY(-5px);
    box-shadow:0 12px 28px rgba(0,0,0,0.18);
}

/* IMAGE */
.book-image{
    height:240px;
    border-radius:6px;
    overflow:hidden;
    background:white;
    margin-bottom:10px;
    display:flex;
    align-items:center;
    justify-content:center;
}

/* GAMBAR */
.book-image img{
    width:100%;
    height:100%;
    object-fit:contain;
    border:1px solid #e5e7eb;
    border-radius:6px;
    background:white;
}

/* NO IMAGE */
.no-image{
    font-size:12px;
    color:#777;
}

/* TEXT */
.title{
    font-weight:600;
    font-size:15px;
    margin-bottom:4px;
}

.author{
    font-size:13px;
    color:#777;
    margin-bottom:6px;
}

.price{
    margin-top:auto;
    font-weight:bold;
    color:#1E3A5F;
}

.h1 {
    margin-left:60px;
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
<div class="content-wrapper">
    <div class="h1">
    <h1>Produk</h1>
</div>

@foreach($kategori as $kat)
<div class="section">

    <div class="section-header">
        <h2>{{ $kat->nama_kategori }}</h2>
        <a href="{{ route('admin.kategori', $kat->id) }}" class="lihat-semua">Lihat Semua</a>
    </div>

    <div class="book-grid">
        @foreach($kat->produk as $item)
        <a href="{{ route('admin.produk.detail', $item->id) }}" class="book-link">
            
            <div class="book-card">

                <div class="book-image">
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}">
                    @else
                        <div class="no-image">No Image</div>
                    @endif
                </div>

                <div class="title">{{ $item->nama }}</div>
                <div class="author">{{ $item->penulis }}</div>
                <div class="price">
                    Rp{{ number_format($item->harga,0,',','.') }}
                </div>

            </div>

        </a>
        @endforeach
    </div>

</div>
@endforeach

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

</body>
</html>
