<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Staff - BookHaven</title>

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
            padding-left:60px;
            padding-right:60px;
            padding-bottom:40px;
        }

        .transaksi-page{
            max-width:1240px;
            margin:0 auto;
        }

        .transaksi-tools{
            display:flex;
            justify-content:flex-start;
            margin-bottom:20px;
        }

        .transaksi-search{
            width:min(420px, 100%);
            padding:12px 16px;
            border:1px solid #cfcfcf;
            border-radius:18px;
            font-size:14px;
            outline:none;
            box-shadow:0 2px 8px rgba(0,0,0,0.06);
        }

        .transaksi-top-layout{
            display:flex;
            gap:24px;
            align-items:flex-start;
            margin-bottom:32px;
        }

        .transaksi-board{
            flex:1;
            background:#fff;
            border:2px solid #d9d9d9;
            border-radius:22px;
            box-shadow:0 4px 14px rgba(0,0,0,0.10);
            overflow:hidden;
        }

        .transaksi-board-header{
            background:#ececec;
            text-align:center;
            padding:12px 20px;
            font-size:20px;
            font-weight:800;
            color:#161616;
        }

        .transaksi-board-body{
            padding:18px 22px 22px;
        }

        .transaksi-summary-card{
            width:285px;
            min-width:285px;
            background:#fff;
            border:2px solid #d9d9d9;
            border-radius:22px;
            box-shadow:0 4px 14px rgba(0,0,0,0.10);
            padding:18px 20px 24px;
        }

        .transaksi-summary-logo{
            text-align:center;
            padding-bottom:14px;
            border-bottom:1px solid #cfcfcf;
            margin-bottom:16px;
        }

        .transaksi-summary-logo img{
            width:66px;
            height:auto;
            display:block;
            margin:0 auto 6px;
        }

        .transaksi-summary-logo span{
            display:block;
            color:#18365a;
            font-weight:800;
        }

        .transaksi-summary-card h3{
            font-size:16px;
            margin-bottom:6px;
        }

        .transaksi-summary-card p{
            font-size:15px;
            color:#222;
            margin-bottom:6px;
        }

        .transaksi-entry{
            display:grid;
            grid-template-columns:minmax(0, 1.4fr) minmax(180px, 0.7fr);
            gap:18px;
            padding:18px 12px;
            align-items:start;
        }

        .transaksi-entry + .transaksi-entry{
            border-top:1px solid #ececec;
        }

        .transaksi-main{
            display:flex;
            gap:18px;
            min-width:0;
        }

        .produk-cover{
            width:78px;
            height:112px;
            object-fit:cover;
            border:1px solid #cfcfcf;
            box-shadow:0 2px 6px rgba(0,0,0,0.12);
            flex-shrink:0;
        }

        .produk-info{
            flex:1;
            min-width:0;
        }

        .produk-info h4{
            font-size:16px;
            font-weight:800;
            color:#222;
            margin-bottom:6px;
        }

        .transaksi-meta{
            font-size:13px;
            color:#333;
            line-height:1.55;
        }

        .transaksi-meta p{
            margin-bottom:2px;
        }

        .transaksi-time{
            margin-top:8px;
            color:#666;
            font-size:12px;
        }

        .status-chip{
            display:inline-block;
            margin-top:8px;
            border:1px solid #bcbcbc;
            background:#fff;
            color:#222;
            border-radius:16px;
            padding:4px 12px;
            font-size:12px;
            font-weight:700;
            box-shadow:0 1px 3px rgba(0,0,0,0.10);
        }

        .empty-state{
            padding:24px 8px;
            text-align:center;
            color:#666;
        }

        .label-hapus{
            color:red;
            font-size:13px;
            margin-left:5px;
        }

        @media(max-width: 1100px){
            .transaksi-top-layout{
                flex-direction:column;
            }

            .transaksi-summary-card{
                width:100%;
                min-width:0;
            }
        }

        @media(max-width: 768px){
            .content-wrapper{
                padding-left:18px;
                padding-right:18px;
            }

            .transaksi-entry{
                grid-template-columns:1fr;
            }

            .transaksi-main{
                flex-direction:column;
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

        html, body{
            height:100%;
        }

        body{
            display:flex;
            flex-direction:column;
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
    <div class="transaksi-page">
        <div class="transaksi-tools">
            <input type="text" id="transaksiSearch" class="transaksi-search" placeholder="Cari transaksi, user, produk, tanggal, atau total...">
        </div>

        <div class="transaksi-top-layout">
            <div class="transaksi-board">
                <div class="transaksi-board-header">Riwayat Transaksi</div>
                <div class="transaksi-board-body">
                    @forelse($transaksi as $t)
                        <div class="transaksi-entry searchable-transaction" data-search="{{ strtolower((($t->produk->nama ?? '').' '.($t->user->name ?? '').' '.($t->created_at ? $t->created_at->translatedFormat('d F Y H:i') : '').' '.($t->jumlah ?? '').' '.($t->total_harga ?? '').' diterima transaksi berhasil '.number_format($t->total_harga ?? 0,0,',','.'))) }}">
                            <div class="transaksi-main">
                                @if($t->produk)
                                    <img class="produk-cover" src="{{ asset('storage/'.$t->produk->gambar) }}">
                                @else
                                    <img class="produk-cover" src="https://via.placeholder.com/80x112?text=No+Image">
                                @endif

                                <div class="produk-info">
                                    @if($t->produk && $t->produk->deleted_at)
                                        <h4>{{ $t->produk->nama }} <span class="label-hapus">(Produk dihapus)</span></h4>
                                    @elseif($t->produk)
                                        <h4>{{ $t->produk->nama }}</h4>
                                    @else
                                        <h4>Produk tidak tersedia</h4>
                                    @endif

                                    <div class="transaksi-meta">
                                        <p>Jumlah : {{ $t->jumlah }}</p>
                                        <p>Total Harga : Rp{{ number_format($t->total_harga ?? 0,0,',','.') }}</p>
                                        <p>
                                            User :
                                            @if($t->user)
                                                {{ $t->user->name }}
                                                @if($t->user->deleted_at)
                                                    <span class="label-hapus">User dihapus</span>
                                                @endif
                                            @else
                                                <span class="label-hapus">User dihapus</span>
                                            @endif
                                        </p>
                                    </div>

                                    <div class="transaksi-time">
                                        Waktu Transaksi : {{ $t->created_at ? $t->created_at->translatedFormat('d F Y H:i') : '-' }}
                                    </div>

                                    <div class="status-chip">Transaksi Berhasil</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">Belum ada transaksi</div>
                    @endforelse
                </div>
            </div>

            <div class="transaksi-summary-card">
                <div class="transaksi-summary-logo">
                    <img src="{{ asset('storage/Logo.png') }}" alt="BookHaven">
                    <span>BookHaven</span>
                </div>

                <h3>Total Transaksi</h3>
                <p>{{ $totalTransaksi ?? 0 }} Transaksi</p>
                <h3>Total Penjualan</h3>
                <p>Rp{{ number_format($totalPenjualan ?? 0,0,',','.') }}</p>
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
const transaksiSearch = document.getElementById('transaksiSearch');
const searchableTransactions = document.querySelectorAll('.searchable-transaction');

if (transaksiSearch) {
    transaksiSearch.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();

        searchableTransactions.forEach(item => {
            const text = ((item.dataset.search || '') + ' ' + (item.innerText || '')).toLowerCase();
            item.style.display = text.includes(keyword) ? '' : 'none';
        });
    });
}
</script>

</body>
</html>
