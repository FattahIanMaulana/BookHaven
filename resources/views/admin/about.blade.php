<!DOCTYPE html>
<html>
<head>
    <title>About Admin - BookHaven</title>

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


<!-- About Section -->
<div class="about-section">

    <!-- JUDUL -->
    <h1 class="about-title">Tentang Kami - Bookhaven</h1>

    <!-- ROW 1 -->
    <div class="about-row">

        <!-- GAMBAR 1 -->
        <div class="about-img">
           <img src="{{ asset('storage/about1.png') }}">
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
            <img src="{{ asset('storage/about2.jpg') }}">
        </div>

        <!-- TEXT 3 & 4 -->
        <div class="about-text">
            <p>Kami percaya bahwa buku adalah jendela pengetahuan. Oleh karena itu, BookHaven berkomitmen untuk menjadi tempat yang membantu pembaca menemukan buku yang tepat sesuai dengan kebutuhan dan minat mereka.</p>

            <p>Sebagai platform e-commerce, BookHaven terus berupaya memberikan layanan yang informatif, transparan, dan mudah digunakan, sehingga pengguna dapat berbelanja buku dengan lebih praktis dan efisien.</p>
        </div>

        <!-- GAMBAR 3 & 4 -->
        <div class="about-img-group">
            <img src="{{ asset('storage/perpus1.png') }}">
            <img src="{{ asset('storage/perpus2.png') }}">
        </div>

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

</body>
</html>
