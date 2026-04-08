<!DOCTYPE html>
<html>
<head>
    <title>Checkout - BookHaven</title>

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



   .content-wrapper{
        padding: 120px 40px 60px;
        background: white;
        min-height: 100vh;
    }

    .checkout-wrapper{
        display: flex;
        gap: 30px;
        align-items: flex-start;
        flex-wrap: wrap;
    }

   .checkout-left{
    flex: 1;
    min-width: 700px;
    background: #fff;
    border-radius: 25px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.12);
    overflow: hidden;
    height: auto;
}

.checkout-header{
    background: #ececec;
    text-align: center;
    padding: 18px;
    font-size: 30px;
    font-weight: bold;
}

.checkout-body{
    padding: 25px 30px;
}



.bottom-total{
    margin: 20px 0;
    font-size: 22px;
    border-top: 1.5px solid #000000;
    border-bottom: 1.5px solid #000000;
}

.subtotal{
    font-weight:bold;
}

    .checkout-title{
        font-size: 34px;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .checkout-card{
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 20px 0;
        border-bottom: 1px solid #ddd;
    }

    .checkout-card:last-child{
        border-bottom: none;
    }

    .checkout-card img{
        width: 90px;
        height: 120px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    .checkout-info{
        flex: 1;
    }

    .checkout-info h3{
        margin: 0 0 10px;
        font-size: 24px;
        font-weight: 700;
        margin-bottom:45px;
    }

    .checkout-info p{
        margin: 4px 0;
        font-size: 17px;
        color: #333;
        margin-top:;
    }

    .checkout-right{
        width: 380px;
        background: #fff;
        border-radius: 25px;
        padding: 25px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.12);
    }

    .section-title{
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .total-box{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0 30px;
        font-size: 24px;
        font-weight: bold;
    }

    .option-group{
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-bottom: 30px;
    }

    .option-card{
        border: 2px solid #ddd;
        border-radius: 18px;
        padding: 15px;
        display: flex;
        align-items: center;
        gap: 15px;
        cursor: pointer;
        transition: 0.2s;
        background: #fafafa;
    }

    .option-card:hover{
        border-color: #1E3A5F;
    }

    .option-card input{
        transform: scale(1.2);
    }

    .option-image{
        width: 55px;
        height: 55px;
        border-radius: 12px;
        background: #e5e5e5;
        overflow: hidden;
        flex-shrink: 0;
    }

    .option-image img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .option-text{
        flex: 1;
    }

    .option-text h4{
        margin: 0 0 4px;
        font-size: 17px;
        font-weight: bold;
    }

    .option-text p{
        margin: 0;
        font-size: 14px;
        color: #666;
    }

    .pay-btn{
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 30px;
        background: #d9d9d9;
        color: #777;
        font-size: 20px;
        font-weight: bold;
        cursor: not-allowed;
        transition: 0.3s;
    }

    .pay-btn.active{
        background: #1E3A5F;
        color: white;
        cursor: pointer;
    }

    @media(max-width: 1200px){
        .checkout-left{
            min-width: 100%;
        }

        .checkout-right{
            width: 100%;
        }
    }


   .popup{
    position:fixed;
    top:0; left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.4);
    display:none;
    justify-content:center;
    align-items:center;
    z-index:9999;
}

.popup-content{
    background:white;
    width:350px;
    padding:20px;
    border-radius:20px;
    text-align:center;

     max-height:90vh;     /* 🔥 batas tinggi */
    overflow-y:auto;     /* 🔥 biar bisa scroll */
}

/* TITLE */
.title{
    font-size:22px;
    font-weight:700;
    margin-bottom:10px;
}

/* PAYMENT IMAGE */
.payment-display img{
    width:180px;
    margin:10px auto;
}

/* TOTAL */
.total{
    margin:10px 0;
}

/* SUBTITLE */
.subtitle{
    font-weight:700;
    margin-top:10px;
}

/* DESC */
.desc{
    font-size:13px;
    margin:10px 0;
}

/* UPLOAD BUTTON */
.upload-btn{
    display:inline-block;
    padding:6px 14px;
    border-radius:20px;
    border:1px solid #000;
    background:white;
    cursor:pointer;
    margin-top:10px;
}

/* PREVIEW */
.preview{
    width:120px;
    display:none;
    margin:10px auto;
    border-radius:10px;
}

/* BUTTON */
.btn-main{
    width:100%;
    margin-top:15px;
    padding:10px;
    border:none;
    border-radius:20px;
    background:#1E3A5F;
    font-weight:700;
    cursor:pointer;
    color:white;
}

/* ERROR */
.error-text{
    color:red;
    font-size:12px;
    margin-top:8px;
    text-align:center;
}

.alert-error{
    margin-bottom:18px;
    padding:12px 16px;
    border-radius:12px;
    background:#fee2e2;
    border:1px solid #fca5a5;
    color:#b91c1c;
}

.payment-info {
    text-align: center;
}

.payment-info p {
    font-weight: bold;  /* bikin teks bold */
    margin: 5px 0;     /* optional, biar jarak antar p rapi */
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




<div class="content-wrapper">

    <div class="checkout-wrapper">

        {{-- KIRI --}}
        <div class="checkout-left">

    <div class="checkout-header">
        Checkout
    </div>

    <div class="checkout-body">
            @if(session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            @forelse($keranjang ?? [] as $item)
                @if($item->produk)
                    <div class="checkout-card">
                        <img src="{{ asset('storage/' . $item->produk->gambar) }}">

                        <div class="checkout-info">
                            <h3>{{ $item->produk->nama }}</h3>
                            <p>Jumlah: {{ $item->jumlah }}</p>
                            <div class="subtotal">
                            <p>Rp{{ number_format(($item->produk->harga ?? 0) * ($item->jumlah ?? 0),0,',','.') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <p>Keranjang kosong</p>
            @endforelse

        </div>
</div>

        {{-- KANAN --}}
        <div class="checkout-right">

            <div class="section-title">
                Pilih Pengiriman
            </div>

            <div class="option-group">

                <label class="option-card">
                    <input type="radio" name="pengiriman" value="JNE">

                    <div class="option-image">
                        <img src="{{ asset('storage/jne.png') }}" alt="">
                    </div>

                    <div class="option-text">
                        <h4>JNE</h4>
                    </div>
                </label>

                <label class="option-card">
                    <input type="radio" name="pengiriman" value="J&T">

                    <div class="option-image">
                        <img src="{{ asset('storage/j&t.png') }}" alt="">
                    </div>

                    <div class="option-text">
                        <h4>J&T</h4>
                       
                    </div>
                </label>

            </div>

            <div class="section-title">
                Metode Pembayaran
            </div>

            <div class="option-group">

                <label class="option-card">
                    <input type="radio" name="metode" value="QRIS">

                    <div class="option-image">
                        <img src="{{ asset('storage/qris.png') }}" alt="">
                    </div>

                    <div class="option-text">
                        <h4>QRIS</h4>
                    </div>
                </label>

                <label class="option-card">
                    <input type="radio" name="metode" value="Transfer Bank">

                    <div class="option-image">
                        <img src="{{ asset('storage/bank.png') }}" alt="">
                    </div>

                    <div class="option-text">
                        <h4>Transfer Bank</h4>
                        
                    </div>
                </label>

            </div>

            <div class="payment-divider"></div>

            <div class="total-box bottom-total">
                <span>Total Belanja</span>
                <span>Rp{{ number_format($totalHarga ?? 0,0,',','.') }}</span>
            </div>

            <button class="pay-btn" id="btnBayar">
                Bayar
            </button>

        </div>

    </div>

</div>




<!-- popup -->

<div class="popup" id="popup">
    <div class="popup-content">

        <h2 class="title">BookHaven</h2>

        <!-- 🔥 TEMPAT GAMBAR PEMBAYARAN -->
        <div id="paymentDisplay" class="payment-display"></div>

        <h3 class="total">
            Total Belanja : Rp{{ number_format($totalHarga ?? 0,0,',','.') }}
        </h3>

        <hr>

        <h3 class="subtitle">Bukti Pembayaran</h3>

        <p id="uploadText" class="desc">
            Masukkan bukti pembayaran dengan jelas agar pesanan dapat dibuat dan diproses
        </p>

        <form action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="metode_pembayaran" id="metodeFix">
            <input type="hidden" name="metode_pengiriman" id="pengirimanFix">

            <!-- UPLOAD -->
            <label class="upload-btn">
                Upload
                <input type="file" name="bukti_bayar" id="bukti" hidden required>
            </label>

            <p id="fileError" class="error-text"></p>
            @error('bukti_bayar')
                <p class="error-text">{{ $message }}</p>
            @enderror

            <!-- PREVIEW -->
            <img id="preview" class="preview">

            <button type="submit" class="btn-main">Buat Pesanan</button>
        </form>

    </div>
</div>




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
document.addEventListener("DOMContentLoaded", function () {

    const btn = document.getElementById("btnBayar");
    const popup = document.getElementById("popup");
    const formPesanan = document.querySelector('#popup form');

    function showPaymentInfo(metodeValue) {
        const display = document.getElementById('paymentDisplay');

        if (!display || !metodeValue) {
            return;
        }

        if (metodeValue === 'QRIS') {
            display.innerHTML = `
                <img src="/storage/qtoko.jpeg">
            `;
        } else {
            display.innerHTML = `
                <div class="payment-info">
                    <img src="/storage/mandiri.jpg"><br>
                    <p>No. Rekening: 08999333281</p>
                </div>
            `;
        }
    }

    if (btn) {
        btn.addEventListener("click", function () {

            let alamat = @json(optional(Auth::user())->alamat);
            let nohp = @json(optional(Auth::user())->no_telepon);

            if (!alamat || !nohp) {
                alert("Lengkapi Alamat & No HP terlebih dahulu");
                return;
            }

            let metode = document.querySelector('input[name="metode"]:checked');
            let pengiriman = document.querySelector('input[name="pengiriman"]:checked');

            if (!metode || !pengiriman) {
                alert("Pilih kurir & metode pembayaran!");
                return;
            }
            
            

            // 🔥 TAMPILKAN POPUP
            popup.style.display = 'flex';
            document.body.style.overflow = 'hidden';

            document.getElementById('metodeFix').value = metode.value;
            document.getElementById('pengirimanFix').value = pengiriman.value;

            // 🔥 TAMPILKAN GAMBAR PEMBAYARAN
            showPaymentInfo(metode.value);

            // 🔥 (OPTIONAL) fallback text lama kalau masih dipakai
            let info = document.getElementById('infoPembayaran');
            if (info) {
                info.innerHTML =
                    metode.value === 'QRIS'
                    ? "Scan QRIS"
                    : "Transfer ke BCA 123456789";
            }

        });
    }

    // 🔥 UPLOAD BUKTI
    let bukti = document.getElementById('bukti');

    if (bukti) {
        bukti.onchange = function (e) {
            let file = e.target.files[0];
            let errorText = document.getElementById('fileError');
            let preview = document.getElementById('preview');
            let text = document.getElementById('uploadText');

            if (!file) return;

            // VALIDASI HARUS GAMBAR
            if (!file.type.startsWith('image/')) {
                errorText.innerText = "File harus berupa gambar (jpg,png dsb)";
                e.target.value = "";
                if (preview) preview.style.display = 'none';
                return;
            } else {
                errorText.innerText = "";
            }

            let reader = new FileReader();
            reader.onload = function () {
                if (preview) {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }

                // 🔥 HILANGKAN TEXT SAAT SUDAH UPLOAD
                if (text) {
                    text.style.display = 'none';
                }
            }
            reader.readAsDataURL(file);
        }
    }

    

    // 🔥 AKTIFKAN BUTTON BAYAR
    const radios = document.querySelectorAll('input[name="pengiriman"], input[name="metode"]');
    const payBtn = document.getElementById('btnBayar');

    function checkSelection() {
        const pengiriman = document.querySelector('input[name="pengiriman"]:checked');
        const metode = document.querySelector('input[name="metode"]:checked');

        if (pengiriman && metode) {
            payBtn.classList.add('active');
        } else {
            payBtn.classList.remove('active');
        }
    }

    radios.forEach(radio => {
        radio.addEventListener('change', checkSelection);
    });

});

// 🔥 CLOSE POPUP
function closePopup() {
    document.getElementById('popup').style.display = 'none';
    document.body.style.overflow = 'auto';
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
