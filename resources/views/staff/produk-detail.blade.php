<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk Staff - BookHaven</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI';
        }

        body{background:#fff;}
        a{text-decoration:none;}

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

        .nav-left{
            display:flex;
            align-items:center;
            gap:10px;
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

        .logo-img{
            width:40px;
            height:auto;
        }

        .logo{
            font-size:20px;
            font-weight:700;
            color:#1E3A5F;
        }

        .nav-right{
            display:flex;
            gap:10px;
            align-items:center;
        }

        .btn{
            background:#dc2626;
            color:white;
            padding:10px 16px;
            border-radius:20px;
            font-size:14px;
            border:none;
            cursor:pointer;
            font-weight:700;
        }

        .content-wrapper{
            padding-top:100px;
            background:white;
            padding-bottom:25px;
        }

        .container{
            max-width:1100px;
            margin:auto;
            padding:30px 20px;
        }

        .detail-box{
            display:flex;
            gap:40px;
            align-items:stretch;
        }

        .left-side{
            width:35%;
            display:flex;
            justify-content:center;
            align-items:flex-start;
            padding-right:30px;
            border-right:2px solid #000;
        }

        .produk-img{
            width:230px;
            height:auto;
            align-self:flex-start;
            border:1px solid #999;
            box-shadow:0 4px 10px rgba(0,0,0,0.2);
            background:#fff;
        }

        .right-side{
            width:65%;
        }

        .judul-buku{
            font-size:42px;
            font-weight:bold;
            margin-bottom:5px;
            line-height:1.1;
        }

        .penulis{
            font-size:20px;
            margin-bottom:25px;
            color:#222;
        }

        .harga{
            font-size:24px;
            font-weight:bold;
            margin-bottom:5px;
        }

        .stok{
            font-size:18px;
            font-weight:600;
            margin-bottom:25px;
        }

        .toko{
            font-size:20px;
            font-weight:500;
            margin-bottom:30px;
        }

        .section-title{
            font-size:22px;
            font-weight:bold;
            margin-bottom:-20px;
            margin-top:25px;
        }

        .deskripsi{
            font-size:16px;
            line-height:1.9;
            color:#333;
            margin-bottom:35px;
            text-align:justify;
            white-space:pre-line;
        }

        .detail-buku-grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:15px 60px;
            margin-top:30px;
            margin-bottom:35px;
        }

        .detail-item-title{
            font-size:14px;
            font-weight:bold;
            margin-bottom:5px;
        }

        .detail-item-value{
            font-size:15px;
            color:#444;
        }

        .rating-summary{
            display:flex;
            align-items:center;
            gap:8px;
            margin-bottom:15px;
        }

        .rating-summary .stars{
            color:#f5a300;
            font-size:18px;
            margin-top:25px;
        }

        .rating-summary .text{
            font-size:16px;
            color:#333;
            margin-top:25px;
        }

        .ulasan-box{
            background:#fff;
            border:1px solid #d7d7d7;
            border-radius:12px;
            padding:16px;
            margin-bottom:18px;
            box-shadow:0 2px 8px rgba(0,0,0,0.12);
        }

        .ulasan-header{
            display:flex;
            align-items:center;
            gap:10px;
            margin-bottom:8px;
            flex-wrap:wrap;
        }

        .ulasan-user{
            font-weight:500;
            font-size:15px;
        }

        .ulasan-rating{
            color:#f5a300;
            font-size:16px;
        }

        .ulasan-text{
            font-size:15px;
            color:#222;
            line-height:1.7;
        }

        .btn-area{
            display:flex;
            justify-content:flex-end;
            align-items:center;
            margin-top:20px;
            margin-bottom:35px;
        }

        .lihat-ulasan{
            color:#1E3A5F;
            font-size:16px;
            font-weight:600;
            cursor:pointer;
            text-decoration:none;
            background:none;
            border:none;
        }

        .hidden{
            display:none;
        }

        @media(max-width: 900px){
            .detail-box{
                flex-direction:column;
            }

            .left-side,
            .right-side{
                width:100%;
                border-right:none;
                padding-right:0;
            }

            .left-side{
                margin-bottom:30px;
            }

            .detail-buku-grid{
                grid-template-columns:1fr;
            }

            .btn-area{
                justify-content:flex-start;
            }
        }

        .footer{
            background:#E5E7EB;
            padding:40px 60px;
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            flex-wrap:wrap;
        }

        .footer-left p:last-child{
            margin-top:25px;
            font-size:13px;
            color:#555;
        }

        .footer-right{
            text-align:center;
            margin-top:6.5px;
        }

        .footer-right h3{
            margin-bottom:14px;
            font-size:24px;
            font-weight:700;
        }

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

        body{
            background:#fff;
        }
    </style>
</head>

<body>

<div class="navbar">
    <div class="nav-left">
        <img src="{{ asset('storage/Logo.png') }}" class="logo-img">
        <a href="{{ route('staff.dashboard') }}" class="logo">
            BookHaven
        </a>
    </div>

    <div class="nav-center">
        <a href="{{ route('staff.produk.index') }}">Manajemen Produk</a>
        <a href="{{ route('staff.pesanan.index') }}">Pesanan</a>
        <a href="{{ route('staff.transaksi.index') }}">Transaksi</a>
        <a href="{{ route('staff.laporan.index') }}">Laporan</a>
    </div>

    <div class="nav-right">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn">Logout</button>
        </form>
    </div>
</div>

<div class="content-wrapper">
    <div class="container">
        <div class="detail-box">
            <div class="left-side">
                <img src="{{ $produk->gambar ? asset('storage/'.$produk->gambar) : asset('images/default.png') }}" class="produk-img">
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
                            {{ ($produk->jumlah_halaman !== null && $produk->jumlah_halaman != 0) ? $produk->jumlah_halaman : '-' }}
                        </div>
                    </div>
                </div>

                <div class="section-title">Ulasan Produk</div>

                <div class="rating-summary">
                    <div class="stars">&#9733;&#9733;&#9733;&#9733;&#9734;</div>
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
                                        {!! $i <= $u->rating ? '&#9733;' : '&#9734;' !!}
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
                                        {!! $i <= $u->rating ? '&#9733;' : '&#9734;' !!}
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
                    @if(($ulasan ?? collect())->count() > 2)
                        <button onclick="toggleUlasan()" id="btnUlasan" class="lihat-ulasan">
                            Lihat Semua Ulasan
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="footer-left">
        <h3>Tentang BookHaven</h3>
        <p><a href="{{ route('staff.about') }}">Tentang Kami</a></p>
        <p><a href="https://wa.me/6281317705750" target="_blank">Hubungi Kami</a></p>
        <p class="copyright">
            © 2026, BookHaven - Sistem Informasi E-Commerce Buku
        </p>
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
function toggleUlasan() {
    let awal = document.getElementById('ulasan-awal');
    let semua = document.getElementById('ulasan-semua');
    let btn = document.getElementById('btnUlasan');

    if (!awal || !semua || !btn) return;

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
