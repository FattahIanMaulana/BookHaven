<!DOCTYPE html>
<html>
<head>
<title>Homepage - BookHaven</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI';}
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
    justify-content:space-between;
    z-index:9999;
}

/* LOGO */
.logo{
    font-size:20px;
    font-weight:700;
    color:#1E3A5F;
    margin-left:5px;
}



/* CENTER */
.nav-center{
    display:flex;
    align-items:center;
    gap:15px;
    flex:1;
    justify-content:center;
}

/* SEARCH WRAPPER */
.search-wrapper{
    display:flex;
    align-items:center;
    background:white;
    border-radius:30px;
    border:1px solid black;
    overflow:visible; /* 🔥 FIX biar dropdown gak ke-cut */
    max-width:520px;
    width:100%;
    position:relative; /* 🔥 FIX penting */
}

/* DROPDOWN */
.dropdown{
    position:relative;
    display:flex;
    align-items:center;
}

/* tombol kategori */
.dropdown-toggle{
    background:white;
    border:none;
    padding:4px 15px;
    cursor:pointer;
    font-weight:600;
    border-radius:30px 0 0 30px;

    transform: translateY(-2px); /* 🔥 INI yang naikin teks */
}


/* 🔥 DROPDOWN MENU FIX TOTAL */
.dropdown-menu{
    display:none;
    position:absolute;
    top:110%; /* 🔥 ini kunci biar turun */
    left:0;
    background:white;
    border-radius:10px;
    border:1px solid #ddd;
    min-width:180px;
    box-shadow:0 6px 16px rgba(0, 0, 0, 0.15);
    z-index:99999;
}

.dropdown-menu a{
    display:block;
    padding:10px;
    color:#333;
    white-space:nowrap; /* 🔥 biar ga melebar */
}

.dropdown-menu a:hover{
    background:#f3f4f6;
}

/* GARIS PEMBATAS */
.divider{
    width:1px;
    height:24px;
    background:#ccc;
}

/* SEARCH */
.search-form{
    display:flex;
    align-items:center;
    flex:1;
}

.search-form input{
    flex:1;
    border:none;
    outline:none;
    padding:10px;
}

/* BUTTON SEARCH (ICON) */
.search-btn{
    border:none;
    background:white;
    padding: 0 15px;
    cursor:pointer;
    font-size:16px;
    border-radius:0 30px 30px 0;
}

.search-btn:hover{
    background:#f3f4f6;
}



/* CART */
.cart-btn{
    width:42px;
    height:42px;
    border-radius:50%;
    background:white;
    border:1px solid #d1d5db;
    display:flex;
    align-items:center;
    justify-content:center;
}

/* RIGHT */
.nav-right{
    display:flex;
    gap:10px;
}

.btn{
    padding:10px 16px;
    border-radius:20px;
    border:none;
    cursor:pointer;
    font-weight:700;
}

.btn-login{
    background:#1E3A5F;
    color:white;
}

.btn-register{
    background:white;
    border:1px solid #1E3A5F;
    color:#1E3A5F;
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
    align-items:center; /* 🔥 FIX biar sejajar */
    margin-bottom:18px;
}

.section-header h2{
    font-size:20px;
    font-weight:700;
    color:#1E1E1E;
}

/* LIHAT SEMUA */
.lihat-semua{
    font-size:14px;
    color:#9CA3AF; /* 🔥 abu terang */
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
     overflow:visible; /* 🔥 penting */
}

/* EFEK KABUT HALUS DI KANAN */
.book-grid::after{
    content:"";
    position:absolute;
    top:0;
    right:0;
    width:120px; /* atur lebar kabut */
    height:100%;
    background:linear-gradient(
        to right,
        rgba(255,255,255,0),
        rgba(255,255,255,0.7),
        white
    );
    pointer-events:none;
}


/* produk ke-6 dibuat pudar */
.book-grid .book-card:nth-child(6){
    opacity:0.4;
    pointer-events:none; /* biar ga bisa diklik */
}


/* CARD */
.book-card{
    background:white;
    border-radius:16px;
    padding:12px;
    box-shadow:0 8px 12px rgba(0,0,0,0.18);
    height:380px; /* 🔥 sedikit lebih tinggi */
    display:flex;
    flex-direction:column;
    cursor:pointer;
    transition:0.2s;
}

.book-card:hover{
    transform:translateY(-5px);
     box-shadow:0 12px 28px rgba(0,0,0,0.18); /* 🔥 bayangan makin dalam */
}

/* IMAGE */
.book-image{
    height:240px; /* 🔥 lebih tinggi biar cover buku enak */
    border-radius:10px;
    overflow:hidden;
    background:white;
    margin-bottom:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:6px; /* 🔥 biar agak halus */
}

/* 🔥 FIX GAMBAR BUKU */
.book-image img{
    width:100%;
    height:100%;
    object-fit:contain; /* 🔥 ini penting biar gak kepotong */
    border:1px solid #e5e7eb;
    border-radius:6px; /* 🔥 biar halus */
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
    font-size:15px; /* 🔥 diperbesar */
    margin-bottom:4px;
}

.author{
    font-size:13px; /* 🔥 diperbesar */
    color:#777;
    margin-bottom:6px;
}

.price{
    margin-top:auto;
    font-weight:bold;
    color:#1E3A5F;
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



/* RESPONSIVE */
@media(max-width:992px){
    .book-grid{grid-template-columns:repeat(3,1fr);}
}

@media(max-width:768px){
    .book-grid{grid-template-columns:repeat(2,1fr);}
}

@media(max-width:480px){
    .book-grid{grid-template-columns:1fr;}
}

@media(max-width:768px){
    .hero-section{
        flex-direction:column;
        padding:10px 30px;
    }

    .hero-right{
        flex-direction:row;
        gap:10px;
    }

    .hero-right img{
        height:auto;
        width:50%;
    }
}

/* HERO IMAGE SECTION */
.hero-section{
    display:flex;
    gap:12px; /* jarak antar kiri dan kanan lebih rapat */
    padding:0 60px;
    margin-top:130px; /* turunin hero lebih jauh dari navbar */
    flex-wrap:wrap;
    align-items:center; /* rata tengah vertikal */
    justify-content:center; /* center horizontal */
    max-height:260px; /* lebih kecil dari sebelumnya */
}

/* LEFT IMAGE BESAR */
.hero-left{
    flex:2; 
    min-width:160px;
    max-height:200px; /* lebih kecil sekitar 15% */
}

.hero-left img{
    width:100%;
    height:100%;
    object-fit:contain;
    border-radius:12px;
    
}

/* RIGHT IMAGES KECIL */
.hero-right{
    flex:1.5; /* proporsional dengan kiri */
    display:flex;
    flex-direction:column;
    gap:35px; /* jarak vertikal antar 2 gambar kanan */
    min-width:130px;
    max-height:200px; /* lebih kecil sekitar 15% */
}

.hero-right img:first-child{
    flex:1; 
    object-fit:contain;
    width:100%;
    border-radius:12px;
}

.hero-right img:last-child{
    flex:1; 
    object-fit:contain;
    width:100%;
    border-radius:12px;
}

/* Jarak hero ke kategori supaya nggak nempel */
.content-wrapper{
    padding-top:260px; /* cukup dekat tapi nggak nempel hero */
}


</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">

<img src="{{ asset('storage/Logo.png') }}" alt="logo">

<a href="{{ route('home') }}" class="logo">BookHaven</a>

<div class="nav-center">

    <div class="search-wrapper">

    <!-- KATEGORI -->
    <div class="dropdown">
        <div class="dropdown-toggle" id="dropdownBtn">
            Kategori <span id="arrow">▼</span>
        </div>

        <div class="dropdown-menu" id="dropdownMenu">
            @foreach($allKategori as $kat)
                <a href="{{ route('login') }}">{{ $kat->nama_kategori }}</a>
            @endforeach
        </div>
    </div>

    <!-- GARIS -->
    <div class="divider"></div>

    <!-- SEARCH -->
    <form action="{{ route('login') }}" method="GET" class="search-form">
        <input type="text" name="q" placeholder="Cari buku..." required>

        <button class="search-btn">
            <!-- 🔥 GANTI PATH GAMBAR DI SINI -->
            <img src="{{ asset('storage/search.webp') }}" width="18">
        </button>
    </form>

</div>

    <!-- CART -->
    <a href="{{ route('keranjang.index') }}">
        <div class="cart-btn">🛒</div>
    </a>

</div>

<div class="nav-right">
    <a href="{{ route('login') }}"><button class="btn btn-login">Login</button></a>
    <a href="{{ route('register') }}"><button class="btn btn-register">Register</button></a>
</div>
</div>



<!-- HERO IMAGE SECTION -->
<div class="hero-section">
    <div class="hero-left">
        <img src="{{ asset('storage/bookhaven1.png') }}" alt="Hero Big Image">
    </div>
    <div class="hero-right">
        <img src="{{ asset('storage/bookhaven2.png') }}" alt="Hero Small Image 1">
        <img src="{{ asset('storage/bookhaven3.png') }}" alt="Hero Small Image 2">
    </div>
</div>



<!-- CONTENT -->
<div class="content-wrapper">

@foreach($kategori as $kat)
<div class="section">

    <div class="section-header">
        <h2>{{ $kat->nama_kategori }}</h2>
        <a href="{{ route('login') }}">Lihat Semua</a>
    </div>

    <div class="book-grid">
        @foreach($kat->produk as $item)
        <div class="book-card" onclick="window.location='{{ route('login') }}'">

            <div class="book-image">
                @if($item->gambar)
                    <img src="{{ asset('storage/'.$item->gambar) }}">
                @else
                    <div style="display:flex;align-items:center;justify-content:center;height:100%;">
                        No Image
                    </div>
                @endif
            </div>

            <div class="title">{{ $item->nama }}</div>
            <div class="author">{{ $item->penulis }}</div>
            <div class="price">Rp{{ number_format($item->harga,0,',','.') }}</div>

        </div>
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
        <p><a href="{{ route('about') }}">Tentang Kami</a></p>
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
const btn = document.getElementById("dropdownBtn");
const menu = document.getElementById("dropdownMenu");
const arrow = document.getElementById("arrow");

btn.addEventListener("click", function(e){
    e.stopPropagation();

    if(menu.style.display === "block"){
        menu.style.display = "none";
        arrow.innerHTML = "▼"; // turun
    } else {
        menu.style.display = "block";
        arrow.innerHTML = "▲"; // naik
    }
});

document.addEventListener("click", function(e){
    if(!e.target.closest('.dropdown')){
        menu.style.display = "none";
        arrow.innerHTML = "▼"; // reset
    }
});
</script>


</body>
</html>