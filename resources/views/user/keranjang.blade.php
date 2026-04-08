<!DOCTYPE html>
<html>
<head>
    <title>Keranjang - BookHaven</title>

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


     .content-wrapper {
        padding: 110px 30px 50px;
        background:white;
        min-height: 100vh;
        flex: 1 0 auto;
    padding-bottom: 50px;
    }

    .cart-layout {
        display: flex;
        gap: 30px;
        align-items: flex-start;
        flex-wrap:wrap;
    }

    .cart-left {
        flex: 1;
        background: #fff;
        border-radius: 25px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
       overflow: visible;
    height: auto;
    align-self: flex-start;

    }

    .cart-header {
        background: #ececec;
        text-align: center;
        padding: 18px;
        font-size: 30px;
        font-weight: bold;
    }

    .cart-body {
        padding: 20px 25px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 18px 0;
         border-bottom: 1px solid #ddd;
    }

    .cart-item:last-child {
    border-bottom: none;
}

    .cart-check input {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    .cart-image img {
        width: 70px;
        height: 100px;
        object-fit: cover;
        border: 1px solid #ccc;
    }

    .cart-info {
        flex: 1;
    }

    .cart-info h3 {
        margin: 0 0 8px;
        font-size: 18px;
        font-weight: bold;
    }

    .cart-price {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 55px;
    }

    .warning {
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .cart-actions {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .delete-btn {
        background: transparent;
        border: none;
        font-size: 22px;
        cursor: pointer;
        z-index: 3;
    }

    .qty-box {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .qty-btn {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 1px solid #aaa;
        background: white;
        cursor: pointer;
        font-size: 18px;
    }

    .qty-number {
        font-size: 18px;
        min-width: 20px;
        text-align: center;
    }

    .btn-disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .cart-right {
        width: 380px;
        background: #fff;
        border-radius: 25px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        padding: 25px;
    }

    .summary-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .summary-text {
        font-size: 16px;
        color: #444;
        margin-bottom: 25px;
    }

    .summary-divider {
        border-top: 1px solid #aaa;
        margin: 20px 0;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .checkout-btn {
    width: 100%;
    padding: 14px;
    border-radius: 30px;
    border: 1px solid #444;
    background: #f5f5f5;
    color: black;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 3px 8px rgba(0,0,0,0.15);
}

.checkout-active {
    background: #1E3A5F;
    color: white;
    border: none;
}

    .checkout-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    @media(max-width: 1000px) {
        .cart-layout {
            flex-direction: column;
        }

        .cart-right {
            width: 100%;
        }
    }



    /* FOOTER */
.footer{
    background:#E5E7EB;
    padding:40px 60px;
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    flex-wrap:wrap;
    margin-top:auto;
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



<div class="content-wrapper">

    <div class="cart-layout">

        {{-- KIRI --}}
        <div class="cart-left">

            <div class="cart-header">
                Keranjang
            </div>

            <div class="cart-body">

                @php $adaProdukTidakValid = false; @endphp

                @forelse($keranjang ?? [] as $item)

                    @php
                        $produk = $item->produk;
                        $tidakValid = !$produk || $produk->deleted_at || $produk->stok < 1;
                        if($tidakValid) $adaProdukTidakValid = true;
                    @endphp

                    <div class="cart-item">

                        {{-- Checkbox --}}
                        <div class="cart-check">
                            <form action="{{ route('keranjang.toggle', $item->id) }}" method="POST">
                                @csrf
                                <input type="checkbox"
                                    onchange="this.form.submit()"
                                    {{ $item->is_checked && !$tidakValid ? 'checked' : '' }}
                                    {{ $tidakValid ? 'disabled' : '' }}>
                            </form>
                        </div>

                        {{-- Gambar --}}
                        <div class="cart-image">
                            @if($produk && $produk->gambar)
                                <img src="{{ asset('storage/' . $produk->gambar) }}">
                            @else
                                <img src="https://via.placeholder.com/100">
                            @endif
                        </div>

                        {{-- Info Produk --}}
                        <div class="cart-info">
                            <h3>{{ $produk->nama ?? 'Produk sudah dihapus' }}</h3>

                            <div class="cart-price">
                                Rp{{ number_format($produk->harga ?? 0,0,',','.') }}
                            </div>

                            @if($tidakValid)
                                <div class="warning">
                                    ⚠ Produk tidak tersedia / sudah dihapus
                                </div>
                            @endif
                        </div>

                        {{-- Aksi --}}
                        <div class="cart-actions">

                            <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST">
    @csrf
    <button type="submit" class="delete-btn">
        🗑
    </button>
</form>

                            <div class="qty-box">

                                <form action="{{ route('keranjang.kurangJumlah', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="qty-btn {{ $tidakValid ? 'btn-disabled' : '' }}" {{ $tidakValid ? 'disabled' : '' }}>
                                        −
                                    </button>
                                </form>

                                <div class="qty-number">
                                    {{ $item->jumlah }}
                                </div>

                                <form action="{{ route('keranjang.tambahJumlah', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="qty-btn {{ $tidakValid ? 'btn-disabled' : '' }}" {{ $tidakValid ? 'disabled' : '' }}>
                                        +
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                @empty
                    <p>Keranjang kosong</p>
                @endforelse

            </div>
        </div>

        {{-- KANAN --}}
        <div class="cart-right">

            <div class="summary-title">
                Ringkasan Belanja
            </div>

            <div class="summary-text">
                Total Barang ({{ $totalItem ?? 0 }} Barang)
            </div>

            <div class="summary-divider"></div>

            <div class="summary-total">
                <span>Total Harga</span>
                <span>Rp{{ number_format($totalHarga ?? 0,0,',','.') }}</span>
            </div>

            @if($adaProdukTidakValid)
                <button class="checkout-btn" disabled>
                    Checkout
                </button>
            @else
                <a href="{{ route('checkout') }}">
                    <button class="checkout-btn {{ ($totalItem ?? 0) > 0 ? 'checkout-active' : '' }} ">
                        Checkout
                    </button>
                </a>
            @endif

        </div>

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
