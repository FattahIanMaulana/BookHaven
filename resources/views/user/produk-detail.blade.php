<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk</title>

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
    z-index:999;
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




 .content-wrapper {
        padding-top: 100px;
        background: white;
        min-height: 100vh;
        padding-bottom: 25px;
    }

    .container {
        max-width: 1100px;
        margin: auto;
        padding: 30px 20px;
    }
.detail-box {
    display: flex;
    gap: 40px;
    align-items: stretch;
}

.left-side {
    width: 35%;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding-right: 30px;
    border-right: 2px solid #000;
}

.produk-img {
    width: 230px;
    height: auto;
    align-self: flex-start;
    border: 1px solid #999;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    background: #fff;
}

    .right-side {
        width: 65%;
    }

    .judul-buku {
        font-size: 42px;
        font-weight: bold;
        margin-bottom: 5px;
        line-height: 1.1;
    }

    .penulis {
        font-size: 20px;
        margin-bottom: 25px;
        color: #222;
    }

    .harga {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: =5px;
    }

    .stok {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 25px;
    }

    .toko {
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 30px;
    }

    .section-title {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: -20px;
        margin-top: 25px;
    }

    .deskripsi {
    font-size: 16px;
    line-height: 1.9;
    color: #333;
    margin-bottom: 35px;
    text-align: justify;
    white-space: pre-line;
}

    .detail-buku-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px 60px;
    margin-top: 30px;
    margin-bottom: 35px;
}


    .detail-item-title {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .detail-item-value {
        font-size: 15px;
        color: #444;
        margin-top:;
    }

    .rating-summary {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 15px;
    }

    .rating-summary .stars {
        color: #f5a300;
        font-size: 18px;
        margin-top:25px;
    }

    .rating-summary .text {
        font-size: 16px;
        color: #333;
        margin-top:25px;
    }

    .ulasan-box {
        background: #fff;
        border: 1px solid #d7d7d7;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 18px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.12);
    }

    .ulasan-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
        flex-wrap: wrap;
    }

    .ulasan-user {
        font-weight: 500;
        font-size: 15px;
    }

    .ulasan-rating {
        color: #f5a300;
        font-size: 16px;
    }

    .ulasan-text {
        font-size: 15px;
        color: #222;
        line-height: 1.7;
    }

    .btn-area {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        margin-bottom: 35px;
    }

    .btn-ulasan {
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 14px 18px;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    }

    .lihat-ulasan {
        color: #1E3A5F;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        background: none;
        border: none;
    }

    .btn-keranjang {
        background: #1E3A5F;
        color: white;
        border: none;
        border-radius: 30px;
        padding: 12px 25px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    }

    .alert-error {
        background: #ffe5e5;
        color: red;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .alert-success {
        background: #e5ffe5;
        color: green;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .hidden {
        display: none;
    }

    @media(max-width: 900px) {
        .detail-box {
            flex-direction: column;
        }

        .left-side,
        .right-side {
            width: 100%;
            border-right: none;
            padding-right: 0;
        }

        .left-side {
            margin-bottom: 30px;
        }

        .detail-buku-grid {
            grid-template-columns: 1fr;
        }

        .btn-area {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
    }

/* Popup Overlay */
.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.55);
    z-index: 9999;
    overflow-y: auto;
    padding: 40px 15px;
}

/* Popup Box */
.popup {
    background: #fff;
    width: 100%;
    max-width: 520px;
    border-radius: 18px;
    padding: 28px;
    margin: 30px auto;
    position: relative;
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
}

.popup-header {
    display: flex;
    gap: 18px;
    align-items: flex-start;
    margin-bottom: 20px;
}

.popup-img {
    width: 95px;
    border-radius: 10px;
    border: 1px solid #ddd;
}

.popup-info h3 {
    font-size: 24px;
    margin: 0 0 6px;
    color: #111;
}

.popup-info p {
    margin: 0;
    color: #666;
    font-size: 15px;
}

.popup-rating-title {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 12px;
    color: #222;
}

.rating-stars {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.star {
    font-size: 34px;
    cursor: pointer;
    color: #d4d4d4;
    transition: 0.2s;
}

.star:hover,
.star.active {
    color: #f5a300;
}

.popup textarea {
    width: 100%;
    min-height: 140px;
    border: 1px solid #d8d8d8;
    border-radius: 12px;
    padding: 15px;
    resize: none;
    font-size: 15px;
    outline: none;
    box-sizing: border-box;
    margin-bottom: 20px;
}

.popup textarea:focus {
    border-color: #1E3A5F;
}

.popup-footer {
    display: flex;
    justify-content: space-between;
    gap: 15px;
     position: relative;
    z-index: 2;
}

.btn-popup-close {
    background: #ececec;
    color: #333;
    border: none;
    padding: 12px 22px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    z-index: 10;
}

.btn-popup-submit {
    background: #1E3A5F;
    color: white;
    border: none;
    padding: 12px 22px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
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




<!-- CONTENT -->
<div class="content-wrapper">
    <div class="container">

        {{-- ALERT --}}
        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $err)
                    <div>{{ $err }}</div>
                @endforeach
            </div>
        @endif

        <div class="detail-box">

            <div class="left-side">
                <img src="{{ asset('storage/'.$produk->gambar) }}" class="produk-img">
            </div>

            <div class="right-side">

                <div class="judul-buku">{{ $produk->nama }}</div>
                <div class="penulis">{{ $produk->penulis }}</div>

                <div class="harga">
                    Rp{{ number_format($produk->harga,0,',','.') }}
                </div>

                <div class="stok">
                    Stok: {{ $produk->stok }}
                </div>

                <div class="toko">
                    <b>Toko:</b> BookHaven.com
                </div>

                <div class="section-title">Deskripsi</div>

                <div class="deskripsi">
                    {{ $produk->deskripsi }}
                </div>

                <div class="section-title">Detail Buku</div>

                <div class="detail-buku-grid">
                    <div>
                        <div class="detail-item-title">Penerbit</div>
                        <div class="detail-item-value">
                            {{ $produk->penerbit ?? 'BookHaven' }}
                        </div>
                    </div>

                    <div>
                        <div class="detail-item-title">Tanggal Terbit</div>
                        <div class="detail-item-value">
                            {{ $produk->tanggal_terbit 
                                ? \Carbon\Carbon::parse($produk->tanggal_terbit)->translatedFormat('d F Y') 
                                : '-' 
                            }}
                        </div>
                    </div>

                    <div>
                        <div class="detail-item-title">Bahasa</div>
                        <div class="detail-item-value">
                            {{ $produk->bahasa ?? '-' }}
                        </div>
                    </div>

                    <div>
                        <div class="detail-item-title">Halaman</div>
                        <div class="detail-item-value">
                            {{ $produk->halaman ?? '-' }}
                        </div>
                    </div>
                </div>

                <div class="section-title">Ulasan Produk</div>

                <div class="rating-summary">
                    <div class="stars">★★★★☆</div>
                    <div class="text">
                        {{ number_format($avgRating ?? 0,1) }} ({{ $totalUlasan ?? 0 }} ulasan)
                    </div>
                </div>

                <div id="ulasan-awal">
                    @forelse(($ulasan ?? collect())->take(2) as $u)
                        <div class="ulasan-box">
                            <div class="ulasan-header">
                                <div class="ulasan-user">
                                    {{ $u->user->name ?? 'User' }} - 
                                    {{ $u->created_at ? $u->created_at->format('d F Y') : '-' }}
                                </div>

                                <div class="ulasan-rating">
                                    @for($i=1; $i<=5; $i++)
                                        {{ $i <= $u->rating ? '★' : '☆' }}
                                    @endfor
                                </div>
                            </div>

                            <div class="ulasan-text">
                                "{{ $u->komentar }}"
                            </div>
                        </div>
                    @empty
                        <p>Belum ada ulasan</p>
                    @endforelse
                </div>

                <div id="ulasan-semua" class="hidden">
                    @foreach($ulasan ?? [] as $u)
                        <div class="ulasan-box">
                            <div class="ulasan-header">
                                <div class="ulasan-user">
                                    {{ $u->user->name ?? 'User' }} - 
                                    {{ $u->created_at ? $u->created_at->format('d F Y') : '-' }}
                                </div>

                                <div class="ulasan-rating">
                                    @for($i=1; $i<=5; $i++)
                                        {{ $i <= $u->rating ? '★' : '☆' }}
                                    @endfor
                                </div>
                            </div>

                            <div class="ulasan-text">
                                "{{ $u->komentar }}"
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="btn-area">
                    <button onclick="openPopup()" class="btn-ulasan">
                        Berikan ulasan
                    </button>

                    @if(($ulasan ?? collect())->count() > 2)
                        <button onclick="toggleUlasan()" id="btnUlasan" class="lihat-ulasan">
                            Lihat semua ulasan
                        </button>
                    @endif
                </div>

                <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
                    @csrf
                    <button class="btn-keranjang">
                        + Keranjang
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>



<!-- popup -->
<div id="overlay" class="overlay">
    <div class="popup">

        <div class="popup-header">
            <img src="{{ asset('storage/'.$produk->gambar) }}" class="popup-img">

            <div class="popup-info">
                <h3>{{ $produk->nama }}</h3>
                <p>{{ $produk->penulis }}</p>
            </div>
        </div>

        <form action="{{ route('ulasan.store') }}" method="POST" onsubmit="return validateRating()">
            @csrf

            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
            <input type="hidden" name="rating" id="ratingInput">

            <div class="popup-rating-title">
                Berikan rating untuk produk ini
            </div>

            <div class="rating-stars">
                @for($i=1; $i<=5; $i++)
                    <span class="star" onclick="setRating({{ $i }})">★</span>
                @endfor
            </div>

            <textarea 
                name="komentar" 
                placeholder="Tulis ulasan anda disini..." 
                required
            ></textarea>

            <div class="popup-footer">
                <button type="button" onclick="closePopup()" class="btn-popup-close">
                    Tutup
                </button>

                <button type="submit" class="btn-popup-submit">
                    Kirim Ulasan
                </button>
            </div>
        </form>

    </div>
</div>






<!-- FOOTER -->
<div class="footer">

    <!-- LEFT -->
    <div class="footer-left">
        <h3>Tentang BookHaven</h3>
        <p><a href="{{ route('user.about') }}">Tentang Kami</a></p>
          <p><a href="https://wa.me/6281317705750" target="_blank">Hubungi Kami (Refund)</a></p>
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
function validateRating(){
    let rating = document.getElementById('ratingInput');
    if(!rating || !rating.value){
        alert("Mohon beri rating bintang terlebih dahulu");
        return false;
    }
    return true;
}

// ❌ HAPUS toggleDropdown lama (biar gak double system)

/* POPUP */
function openPopup() {
    @auth
        @if(!isset($bolehUlas) || !$bolehUlas)
            alert("Review tidak dapat dilakukan karena anda sudah pernah memberikan review atau belum melakukan pembelian produk ini.");
            return;
        @endif
    @else
        alert("diharapkan login terlebih dahulu");
        return;
    @endauth

    let overlay = document.getElementById('overlay');
    if(overlay){
        overlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

function closePopup() {
    let overlay = document.getElementById('overlay');
    if(overlay){
        overlay.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

/* RATING */
function setRating(value) {
    let input = document.getElementById('ratingInput');
    if(input) input.value = value;

    let stars = document.querySelectorAll('.star');

    stars.forEach((s, index) => {
        if(index < value){
            s.classList.add('active');
        } else {
            s.classList.remove('active');
        }
    });
}

/* ULASAN */
function toggleUlasan() {
    let awal = document.getElementById('ulasan-awal');
    let semua = document.getElementById('ulasan-semua');
    let btnUlasan = document.getElementById('btnUlasan');

    if (!awal || !semua || !btnUlasan) return;

    if (semua.classList.contains('hidden')) {
        semua.classList.remove('hidden');
        awal.style.display = 'none';
        btnUlasan.innerText = 'Tutup Ulasan';
    } else {
        semua.classList.add('hidden');
        awal.style.display = 'block';
        btnUlasan.innerText = 'Lihat Semua Ulasan';
    }
}



/* DROPDOWN (VERSI AMAN) */
document.addEventListener("DOMContentLoaded", function(){

    const btn = document.getElementById("dropdownBtn");
    const menu = document.getElementById("dropdownMenu");
    const arrow = document.getElementById("arrow");

    if(btn && menu && arrow){

        btn.addEventListener("click", function(e){
            e.stopPropagation();

            if(menu.style.display === "block"){
                menu.style.display = "none";
                arrow.innerHTML = "▼";
            } else {
                menu.style.display = "block";
                arrow.innerHTML = "▲";
            }
        });

        document.addEventListener("click", function(e){
            if(!e.target.closest('.dropdown')){
                menu.style.display = "none";
                arrow.innerHTML = "▼";
            }
        });

    }

});
</script>


</body>
</html>
