<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User - BookHaven</title>

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
    max-width:520px;
    width:100%;
    position:relative;
}

/* DROPDOWN */
.dropdown{
    position:relative;
    display:flex;
    align-items:center;
}

/* TOMBOL */
.dropdown-toggle{
    padding:8px 15px;
    cursor:pointer;
    font-weight:600;
    border-radius:30px 0 0 30px;
}

/* MENU */
.dropdown-menu{
    display:none;
    position:absolute;
    top:110%;
    left:0;
    background:white;
    border-radius:10px;
    border:1px solid #ddd;
    min-width:180px;
    box-shadow:0 6px 16px rgba(0,0,0,0.15);
    z-index:9999;
}

.dropdown-menu a{
    display:block;
    padding:10px;
    color:#333;
}

.dropdown-menu a:hover{
    background:#f3f4f6;
}

/* GARIS */
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
    border-radius:0 30px 30px 0;
}

/* BUTTON SEARCH */
.search-btn{
    border:none;
    background:white;
    padding:0 15px;
    cursor:pointer;
    border-radius:0 30px 30px 0;
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
    font-size:18px;
}

/* RESPONSIVE */
@media(max-width:768px){
    .nav-center{
        flex-direction:column;
        gap:10px;
    }

    .search-wrapper{
        max-width:100%;
    }
}

/* PROFILE */
.profile-btn{
    width:42px;
    height:42px;
    border-radius:50%;
    background:white;
    border:1px solid #d1d5db;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden; /* 🔥 penting biar gambar bulat */
    cursor:pointer;
}

/* GAMBAR DI DALAMNYA */
.profile-btn img{
    width:75%;
    height:75%;
    object-fit:contain; /* 🔥 biar full isi lingkaran */
}





    
    /* CONTENT */
.content-wrapper{
     padding-top:260px; 
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




    </style>
</head>

<body>

<div class="navbar">

    <div class="nav-left">
        <!-- LOGO GAMBAR -->
        <img src="{{ asset('storage/Logo.png') }}" class="logo-img">

        <!-- NAMA + LINK HOME -->
        <a href="{{ route('user.dashboard') }}" class="logo">
            BookHaven
        </a>
    </div>

    <div class="nav-center">

    <div class="search-wrapper">

        <!-- KATEGORI -->
        <div class="dropdown">
            <div class="dropdown-toggle" id="dropdownBtn">
                Kategori <span id="arrow">▼</span>
            </div>

            <div class="dropdown-menu" id="dropdownMenu">
                @foreach($allKategori as $kat)
                    <a href="{{ route('kategori', $kat->id) }}">
                        {{ $kat->nama_kategori }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- GARIS -->
        <div class="divider"></div>

        <!-- SEARCH -->
        <form action="{{ route('search') }}" method="GET" class="search-form">
            <input type="text" name="q" placeholder="Cari buku..." required>

            <button class="search-btn">
                <img src="{{ asset('storage/search.webp') }}" width="18">
            </button>
        </form>

    </div>

    <!-- CART -->
    <a href="{{ route('keranjang.index') }}">
        <div class="cart-btn">🛒</div>
    </a>
</div>

<a href="{{ route('profile') }}">
    <div class="profile-btn">
        <img src="{{ asset('storage/profile.jpg') }}" alt="profile">
    </div>
</a>

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
        <a href="{{ route('kategori', $kat->id) }}" class="lihat-semua">Lihat Semua</a>
    </div>

    <div class="book-grid">
        @foreach($kat->produk as $item)
        <a href="{{ route('produk.detail', $item->id) }}" class="book-link">
            
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
        <p><a href="{{ route('user.about') }}">Tentang Kami</a></p>
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
