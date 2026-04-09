<!DOCTYPE html>
<html>
<head>
<title>About - BookHaven</title>

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
    overflow:visible;
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

.dropdown-toggle{
    background:white;
    border:none;
    padding:4px 15px;
    cursor:pointer;
    font-weight:600;
    border-radius:30px 0 0 30px;
    transform: translateY(-2px);
}

.dropdown-menu{
    display:none;
    position:absolute;
    top:110%;
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
    white-space:nowrap;
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



/* FOOTER */
.footer{
    background:#E5E7EB;
    padding:40px 60px;
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
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
}

.footer-right h3{
    margin-bottom:14px;
    font-size:24px;
    font-weight:700;
}

/* ICON */
.social-icons{
    display:flex;
    gap:14px;
    justify-content:flex-end;
}

.social-icon{
    width:35px;
    height:35px;
    border-radius:50%;
    background:white;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    box-shadow:0 2px 6px rgba(0,0,0,0.1);
}

.social-icon img{
    width:40px;
    height:40px;
    object-fit:contain;
}



/* ABOUT SECTION */
.about-section{
    padding:175px 60px 20px 60px;
}

/* ROW */
.about-row{
    display:flex;
    align-items:center;
   
    gap:30px;
    margin-bottom:40px;
    flex-wrap:wrap;
}

/* GAMBAR */
.about-img img{
    max-width:600px; /* 🔥 bisa lu ubah */
    height:auto;     /* 🔥 ukuran asli */
    border-radius:12px;
    margin-left:110px;
}

.about-img-group{
    display:flex;
    flex-direction:row; /* 🔥 jadi horizontal */
    gap:15px;
    align-items:flex-start;
}

.about-img-group img:first-child{
    max-width:150px; /* 🔥 kiri lebih kecil */
    margin-left:-5px;
    margin-top:-75px;
}

.about-img-group img:last-child{
    max-width:280px; /* 🔥 kanan lebih besar */
    margin-left:-50px;
    margin-top:35px;
    margin-right:0px;

}

/* GAMBAR 2 KHUSUS */
.about-row:nth-child(3) .about-img img{
    max-width:450px;   /* 🔥 lebih kecil dari gambar 1 */
    margin-top:-10px;
}

/* TEXT */
.about-text{
    max-width:470px;
    margin-top:50px;
}

/* TEXT ROW 2 (BIAR BISA LO ATUR SENDIRI) */
.about-row:nth-child(3) .about-text{
    margin-top:0;      /* bebas ubah */
    margin-left:0;     /* bebas ubah */
}

.about-title{
    font-size:24px;
    font-weight:700;
    margin-bottom:-30px;

    margin-top:-25px;     /* 🔥 turun ke bawah */
    margin-left:740px;    /* 🔥 geser ke kanan */
}


.about-text p{
    margin-bottom:10px;
    line-height:1.6;
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

        <div class="divider"></div>

        <form action="{{ route('login') }}" method="GET" class="search-form">
            <input type="text" placeholder="Cari produk...">
            <button class="search-btn">
                <img src="{{ asset('storage/search.webp') }}" width="18">
            </button>
        </form>

    </div>

    <a href="{{ route('keranjang.index') }}">
        <div class="cart-btn">🛒</div>
    </a>

</div>

<div class="nav-right">
    <a href="{{ route('login') }}"><button class="btn btn-login">Login</button></a>
    <a href="{{ route('register') }}"><button class="btn btn-register">Register</button></a>
</div>
</div>



<!-- About Section -->
<div class="about-section">

    <!-- JUDUL -->
    <h1 class="about-title">Tentang Kami - Bookhaven</h1>

    <!-- ROW 1 -->
    <div class="about-row">

        <!-- GAMBAR 1 -->
        <div class="about-img">
            <img src="storage/about1.png">
        </div>

        <!-- TEXT 1 & 2 -->
        <div class="about-text">
            <p>BookHaven adalah platform e-commerce yang menyediakan berbagai pilihan buku untuk memenuhi kebutuhan membaca masyarakat. Kami menghadirkan buku dari berbagai kategori, mulai dari pendidikan, pengetahuan umum, hingga bacaan populer, yang dapat diakses dengan mudah secara online.</p>

            <p>BookHaven hadir untuk memberikan pengalaman berbelanja buku yang sederhana, aman, dan nyaman. Melalui sistem yang kami rancang, pengguna dapat mencari buku, melakukan pemesanan, serta menyelesaikan proses pembelian dengan alur yang jelas dan mudah dipahami.</p>
        </div>

    </div>

    <!-- ROW 2 -->
    <div class="about-row">

        <!-- GAMBAR 2 -->
        <div class="about-img">
            <img src="storage/about2.jpg">
        </div>

        <!-- TEXT 3 & 4 -->
        <div class="about-text">
            <p>Kami percaya bahwa buku adalah jendela pengetahuan. Oleh karena itu, BookHaven berkomitmen untuk menjadi tempat yang membantu pembaca menemukan buku yang tepat sesuai dengan kebutuhan dan minat mereka.</p>

            <p>Sebagai platform e-commerce, BookHaven terus berupaya memberikan layanan yang informatif, transparan, dan mudah digunakan, sehingga pengguna dapat berbelanja buku dengan lebih praktis dan efisien.</p>
        </div>

        <!-- GAMBAR 3 & 4 -->
        <div class="about-img-group">
            <img src="storage/perpus1.png">
            <img src="storage/perpus2.png">
        </div>

    </div>

</div>



<!-- FOOTER -->
<div class="footer">

    <div class="footer-left">
        <h3>Tentang BookHaven</h3>
        <p><a href="{{ route('about') }}">Tentang Kami</a></p>
         <p><a href="https://wa.me/6281317705750" target="_blank">Hubungi Kami</a></p>
        <p>© 2026, BookHaven - Sistem Informasi E-Commerce Buku</p>
    </div>

    <div class="footer-right">
        <h3>Follow Us</h3>

        <div class="social-icons">

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
</script>

</body>
</html>
