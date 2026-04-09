<!DOCTYPE html>
<html>
<head>
    <title>Profile - BookHaven</title>

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
     height:42px; /* 🔥 kunci tinggi */
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
    height:40px; /* 🔥 paksa tinggi normal */
}

/* BUTTON SEARCH */
.search-btn{
    border:none;
    background:white;
    padding:0 15px;
    cursor:pointer;
    border-radius:0 30px 30px 0;
    height:40px;
    display:flex;
    align-items:center;
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

.icon-search{
    width:18px;
    height:18px;
}

.btn-logout{
    background:#dc2626; /* 🔥 merah biar beda (logout vibe) */
    color:white;
}

.btn{
    padding:10px 16px;
    border-radius:20px;
    border:none;
    cursor:pointer;
    font-weight:700;
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



        body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f6f8;
}

.content-wrapper {
    width: 80%;
    margin: 40px auto;
    margin-top:90px;
}

.title {
    text-align: center;
    margin-bottom: 20px;
}

/* CARD */
.profile-card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* FLEX */
.profile-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

/* FORM */
.profile-form {
    width: 65%;
}

.profile-form label {
    display: block;
    margin-top: 12px;
    margin-bottom: 5px;
    font-weight: 500;
}

.profile-form input,
.profile-form textarea {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 14px;
}

.profile-form textarea {
    height: 80px;
    resize: none;
}

/* IMAGE */
.profile-image-section {
    width: 30%;
    text-align: center;
}

.profile-image {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 15px;
    border: 2px solid #ddd;
    margin-top:60px;
}

.profile-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* BUTTON */
.btn-save {
    background-color: #2f4b6e;
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-save:hover {
    background-color: #1f3550;
}

/* MENU TAB */
.menu {
    display: flex;
    margin-top: 20px;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #2f4b6e;
}

.tab-btn {
    flex: 1;
    padding: 12px;
    background: #fff;
    border: none;
    cursor: pointer;
    font-weight: 500;
}

.tab-btn.active {
    background-color: #2f4b6e;
    color: #fff;
}
        

        .hidden { display:none; }

        .total-box {
            background:#f5f5f5;
            padding:10px;
            margin-top:20px;
            font-weight:bold;
        }

        .badge-danger {
            color:red;
            font-weight:bold;
            font-size:13px;
        }

        .order-status-section{
            width:80%;
            margin:0 auto 40px;
        }

        .order-status-layout{
            display:flex;
            gap:36px;
            align-items:flex-start;
        }

        .order-summary-card{
            width:275px;
            min-width:275px;
            background:#fff;
            border:2px solid #d7d7d7;
            border-radius:20px;
            padding:18px 18px 24px;
            box-shadow:0 6px 14px rgba(0,0,0,0.10);
        }

        .order-summary-logo{
            text-align:center;
            padding-bottom:12px;
            border-bottom:1px solid #dcdcdc;
            margin-bottom:12px;
        }

        .order-summary-logo img{
            width:62px;
            height:auto;
            display:block;
            margin:0 auto 6px;
        }

        .order-summary-logo span{
            display:block;
            font-size:20px;
            font-weight:800;
            color:#18365a;
            line-height:1;
        }

        .order-summary-info h3{
            font-size:20px;
            color:#151515;
            margin-bottom:6px;
        }

        .order-summary-info p{
            font-size:15px;
            color:#333;
        }

        .order-status-board{
            flex:1;
            background:#fff;
            border:2px solid #dedede;
            border-radius:22px;
            box-shadow:0 6px 14px rgba(0,0,0,0.08);
            overflow:hidden;
        }

        .order-status-header{
            background:#efefef;
            text-align:center;
            padding:14px 20px;
            font-size:19px;
            font-weight:800;
            color:#161616;
        }

        .order-status-list{
            padding:10px 18px 18px;
        }

        .order-status-item{
            display:flex;
            gap:18px;
            align-items:flex-start;
            padding:16px 14px;
        }

        .order-status-item + .order-status-item{
            border-top:1px solid #efefef;
        }

        .order-book-cover{
            width:62px;
            height:88px;
            object-fit:cover;
            border:1px solid #cfcfcf;
            box-shadow:0 2px 4px rgba(0,0,0,0.08);
            flex-shrink:0;
        }

        .order-book-content{
            flex:1;
            min-width:0;
        }

        .order-book-title{
            font-size:16px;
            font-weight:800;
            color:#111;
            margin-bottom:2px;
            line-height:1.35;
        }

        .order-book-qty{
            font-size:13px;
            color:#555;
            margin-bottom:18px;
        }

        .order-book-status{
            font-size:14px;
            font-weight:700;
            color:#252525;
            margin-bottom:3px;
        }

        .order-book-note{
            font-size:13px;
            color:#575757;
            line-height:1.45;
            max-width:540px;
        }

        .order-book-meta{
            min-width:120px;
            text-align:right;
            font-size:12px;
            color:#9a9a9a;
            padding-top:72px;
        }

        .order-status-empty{
            padding:28px 20px;
            text-align:center;
            color:#666;
            font-size:15px;
        }

        .order-book-status.is-success{
            color:#252525;
        }

        .order-book-status.is-cancelled{
            color:#252525;
        }

        @media(max-width: 1100px){
            .order-status-layout{
                flex-direction:column;
            }

            .order-summary-card{
                width:100%;
                min-width:0;
            }
        }

        @media(max-width: 768px){
            .order-status-section{
                width:92%;
            }

            .order-status-item{
                flex-wrap:wrap;
            }

            .order-book-meta{
                width:100%;
                min-width:0;
                text-align:left;
                padding-top:0;
                padding-left:80px;
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

/* CONTENT NGISI SISA SPACE */
.content-wrapper{
    flex:1;
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
                <img src="{{ asset('storage/search.webp') }}" class="icon-search">
            </button>
        </form>

    </div>

    <!-- CART -->
    <a href="{{ route('keranjang.index') }}">
        <div class="cart-btn">🛒</div>
    </a>
</div>

        <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="btn btn-logout">Logout</button>
</form>


</div>



      


<div class="content-wrapper">

    <h1 class="title">Profile</h1>

    <div class="profile-card">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <div class="profile-container">

                <!-- LEFT -->
                <div class="profile-form">

                    <label>Username</label>
                    <input type="text" name="name"
                        value="{{ old('name', auth()->user()->name ?? '') }}">

                    <label>Email</label>
                    <input type="text"
                        value="{{ auth()->user()->email ?? '' }}" disabled>

                    <label>No. Telepon</label>
                    <input type="text" name="no_telepon"
                        value="{{ old('no_telepon', auth()->user()->no_telepon ?? '') }}">

                    <label>Alamat</label>
                    <textarea name="alamat">{{ old('alamat', auth()->user()->alamat ?? '') }}</textarea>

                </div>

                <!-- RIGHT -->
                <div class="profile-image-section">

                    <div class="profile-image">
                        <!-- GANTI GAMBAR SENDIRI -->
                        <img src="{{ asset('storage/profile.jpg') }}" alt="Profile">
                    </div>

                    <button type="submit" class="btn-save">
                        Simpan
                    </button>

                </div>

            </div>
        </form>
    </div>

    <!-- MENU TAB -->
    <div class="menu">
        <button onclick="showSection('status', this)" class="tab-btn active">
            Status Pesanan
        </button>
        <button onclick="showSection('riwayat', this)" class="tab-btn">
            Riwayat Transaksi
        </button>
    </div>

</div>






<!-- STATUS -->
<div id="status" class="order-status-section">

@php
    $totalBarangPesanan = 0;
    foreach (($pesanan ?? []) as $pesananItem) {
        foreach (($pesananItem->detail ?? []) as $detailItem) {
            $totalBarangPesanan += $detailItem->jumlah ?? 0;
        }
    }
@endphp

<div class="order-status-layout">
    <div class="order-summary-card">
        <div class="order-summary-logo">
            <img src="{{ asset('storage/Logo.png') }}" alt="BookHaven">
            <span>BookHaven</span>
        </div>

        <div class="order-summary-info">
            <h3>Total Pesanan</h3>
            <p>{{ $totalBarangPesanan }} Barang</p>
        </div>
    </div>

    <div class="order-status-board">
        <div class="order-status-header">Status Pesanan</div>
        <div class="order-status-list">

@forelse($pesanan ?? [] as $p)

    @foreach($p->detail ?? [] as $d)

        @php
            $statusPesanan = $p->status ?? '-';
            $judulStatus = 'Pesanan sedang diproses';
            $catatanStatus = 'Pesanan Anda sedang kami siapkan.';

            if ($statusPesanan === 'menunggu_verifikasi') {
                $judulStatus = 'Pesanan menunggu verifikasi petugas';
                $catatanStatus = 'Proses ini membutuhkan waktu maksimal 12 jam.';
            } elseif ($statusPesanan === 'diterima') {
                $judulStatus = 'Pesanan diterima dan siap dikirim';
                $catatanStatus = 'Pesanan akan dikirim melalui '.$p->metode_pengiriman.'. No Resi: '.($p->no_resi ?? '-').'.';
            } elseif ($statusPesanan === 'tidak_diproses') {
                $judulStatus = 'Pesanan dibatalkan';
                $catatanStatus = 'Pesanan dibatalkan karena melewati batas waktu pengecekan, pengembalian dana akan diproses oleh admin dalam waktu maksimal 1 hari.';
            }
        @endphp

        <div class="order-status-item">

                @if($d->produk)
                    <img src="{{ asset('storage/'.$d->produk->gambar) }}" class="order-book-cover" alt="{{ $d->produk->nama }}">
                @else
                    <img src="{{ asset('no-image.png') }}" class="order-book-cover" alt="Produk tidak ditemukan">
                @endif

                <div class="order-book-content">
                    <h3 class="order-book-title">
                        {{ $d->produk->nama ?? 'Produk tidak ditemukan' }}
                    </h3>

                    {{-- 🔥 FIX UTAMA --}}
                    @if($d->produk && $d->produk->deleted_at)
                        <p class="badge-danger">Produk sudah dihapus</p>
                    @endif

                    <p class="order-book-qty">{{ $d->jumlah }} barang</p>
                    <p class="order-book-status">{{ $judulStatus }}</p>
                    <p class="order-book-note">{{ $catatanStatus }}</p>
                </div>

                <div class="order-book-meta">
                    {{ $p->created_at ? $p->created_at->translatedFormat('d F Y') : '-' }}
                </div>
        </div>

    @endforeach

@empty
<div class="order-status-empty">Belum ada pesanan.</div>
@endforelse

        </div>
    </div>
</div>

</div>



<!-- RIWAYAT -->
<div id="riwayat" class="order-status-section hidden">

@php
    $totalBarangTransaksi = 0;
    foreach (($transaksi ?? []) as $transaksiItem) {
        $statusRiwayatItem = $transaksiItem->pesanan->status ?? null;
        if (in_array($statusRiwayatItem, ['diterima', 'tidak_diproses', 'dibatalkan_sistem'])) {
            $totalBarangTransaksi += $transaksiItem->jumlah ?? 0;
        }
    }

    $adaRiwayatTransaksi = false;
@endphp

<div class="order-status-layout">
    <div class="order-summary-card">
        <div class="order-summary-logo">
            <img src="{{ asset('storage/Logo.png') }}" alt="BookHaven">
            <span>BookHaven</span>
        </div>

        <div class="order-summary-info">
            <h3>Total Transaksi</h3>
            <p>{{ $totalBarangTransaksi }} Barang</p>
        </div>
    </div>

    <div class="order-status-board">
        <div class="order-status-header">Riwayat Transaksi</div>
        <div class="order-status-list">

@foreach($transaksi ?? [] as $t)

    @php
        $statusRiwayat = $t->pesanan->status ?? null;
    @endphp

    @if(in_array($statusRiwayat, ['diterima', 'tidak_diproses', 'dibatalkan_sistem']))

        @php
            $adaRiwayatTransaksi = true;
            $judulRiwayat = 'Transaksi diterima';
            $catatanRiwayat = 'Pesanan telah berhasil diproses dan diterima.';
            $statusClass = 'is-success';

            if (in_array($statusRiwayat, ['tidak_diproses', 'dibatalkan_sistem'])) {
                $judulRiwayat = 'Transaksi dibatalkan';
                $catatanRiwayat = 'Pesanan dibatalkan karena melewati batas waktu pengecekan atau dibatalkan oleh petugas.';
                $statusClass = 'is-cancelled';
            }
        @endphp

        <div class="order-status-item">
            @if($t->produk)
                <img src="{{ asset('storage/'.$t->produk->gambar) }}" class="order-book-cover" alt="{{ $t->produk->nama }}">
            @else
                <img src="{{ asset('no-image.png') }}" class="order-book-cover" alt="Produk tidak ditemukan">
            @endif

            <div class="order-book-content">
                <h3 class="order-book-title">{{ $t->produk->nama ?? 'Produk tidak ditemukan' }}</h3>

            {{-- 🔥 FIX UTAMA --}}
                @if($t->produk && $t->produk->deleted_at)
                    <p class="badge-danger">Produk sudah dihapus</p>
                @endif

                <p class="order-book-qty">{{ $t->jumlah }} barang</p>
                <p class="order-book-status {{ $statusClass }}">{{ $judulRiwayat }}</p>
                <p class="order-book-note">{{ $catatanRiwayat }}</p>
            </div>

            <div class="order-book-meta">
                {{ $t->created_at ? $t->created_at->translatedFormat('d F Y') : '-' }}
            </div>
        </div>

    @endif

@endforeach

@if(!$adaRiwayatTransaksi)
<div class="order-status-empty">Belum ada riwayat transaksi.</div>
@endif

        </div>
    </div>

</div>

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
       function showSection(section, el) {
    let status = document.getElementById('status');
    let riwayat = document.getElementById('riwayat');

    if(status) status.classList.add('hidden');
    if(riwayat) riwayat.classList.add('hidden');

    let target = document.getElementById(section);
    if(target) target.classList.remove('hidden');

    // reset semua tombol
    let buttons = document.querySelectorAll('.tab-btn');
    buttons.forEach(btn => btn.classList.remove('active'));

    // aktifkan yang diklik
    if (el) {
        el.classList.add('active');
    }
        }



        
        function toggleDropdown() {
            let menu = document.getElementById('dropdownMenu');
            if(menu){
                menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
            }
        }

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
