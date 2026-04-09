<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Staff - BookHaven</title>

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

        .pesanan-page{
            max-width:1240px;
            margin:0 auto;
        }

        .pesanan-tools{
            display:flex;
            justify-content:flex-start;
            margin-bottom:20px;
        }

        .pesanan-search{
            width:min(420px, 100%);
            padding:12px 16px;
            border:1px solid #cfcfcf;
            border-radius:18px;
            font-size:14px;
            outline:none;
            box-shadow:0 2px 8px rgba(0,0,0,0.06);
        }

        .pesanan-top-layout{
            display:flex;
            gap:24px;
            align-items:flex-start;
            margin-bottom:32px;
        }

        .pesanan-board{
            flex:1;
            background:#fff;
            border:2px solid #d9d9d9;
            border-radius:22px;
            box-shadow:0 4px 14px rgba(0,0,0,0.10);
            overflow:hidden;
        }

        .pesanan-board + .pesanan-board{
            margin-top:32px;
        }

        .pesanan-board-header{
            background:#ececec;
            text-align:center;
            padding:12px 20px;
            font-size:20px;
            font-weight:800;
            color:#161616;
        }

        .pesanan-board-body{
            padding:18px 22px 22px;
        }

        .pesanan-summary-card{
            width:285px;
            min-width:285px;
            background:#fff;
            border:2px solid #d9d9d9;
            border-radius:22px;
            box-shadow:0 4px 14px rgba(0,0,0,0.10);
            padding:18px 20px 24px;
        }

        .pesanan-summary-logo{
            text-align:center;
            padding-bottom:14px;
            border-bottom:1px solid #cfcfcf;
            margin-bottom:16px;
        }

        .pesanan-summary-logo img{
            width:66px;
            height:auto;
            display:block;
            margin:0 auto 6px;
        }

        .pesanan-summary-logo span{
            display:block;
            color:#18365a;
            font-weight:800;
        }

        .pesanan-summary-card h3{
            font-size:16px;
            margin-bottom:6px;
        }

        .pesanan-summary-card p{
            font-size:15px;
            color:#222;
        }

        .pesanan-entry{
            display:grid;
            grid-template-columns:minmax(0, 1.4fr) minmax(180px, 0.7fr);
            gap:18px;
            padding:18px 12px;
            align-items:start;
        }

        .pesanan-entry + .pesanan-entry{
            border-top:1px solid #ececec;
        }

        .pesanan-main{
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
            cursor:pointer;
            flex-shrink:0;
        }

        .produk-info{
            flex:1;
            min-width:0;
        }

        .produk-list{
            display:flex;
            flex-direction:column;
            gap:14px;
        }

        .produk-list-item{
            display:flex;
            gap:18px;
            align-items:flex-start;
        }

        .produk-list-item + .produk-list-item{
            padding-top:14px;
            border-top:1px solid #efefef;
        }

        .produk-info h4{
            font-size:16px;
            font-weight:800;
            color:#222;
            margin-bottom:6px;
        }

        .pesanan-meta{
            font-size:13px;
            color:#333;
            line-height:1.5;
        }

        .pesanan-meta p{
            margin-bottom:2px;
        }

        .pesanan-summary-info{
            margin-top:24px;
        }

        .pesanan-time{
            margin-top:6px;
            color:#666;
            font-size:12px;
        }

        .resi-input{
            width:160px;
            border:1px solid #bdbdbd;
            border-radius:16px;
            padding:5px 10px;
            font-size:12px;
            margin:6px 0 8px;
        }

        .aksi-row{
            display:flex;
            gap:8px;
            flex-wrap:wrap;
            margin-top:6px;
            align-items:flex-end;
        }

        .aksi-row form{
            margin:0;
            display:flex;
            flex-direction:column;
            justify-content:flex-end;
        }

        .btn-aksi{
            border:1px solid #bcbcbc;
            background:#fff;
            color:#222;
            border-radius:16px;
            padding:4px 12px;
            font-size:12px;
            font-weight:700;
            cursor:pointer;
            line-height:1;
            box-shadow:0 1px 3px rgba(0,0,0,0.10);
        }

        .btn-aksi.terima::after{
            content:" \2714";
            font-size:11px;
        }

        .btn-aksi.tolak::after{
            content:" \2716";
            font-size:11px;
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

        .bukti-panel{
            border-left:1px solid #d6d6d6;
            padding-left:18px;
            min-height:120px;
        }

        .bukti-label{
            font-size:13px;
            font-weight:700;
            color:#444;
            margin-bottom:10px;
        }

        .bukti{
            width:78px;
            height:120px;
            object-fit:cover;
            cursor:pointer;
            border:1px solid #e0e0e0;
        }

        .bukti-kosong{
            font-size:12px;
            color:#777;
        }

        .empty-state{
            padding:24px 8px;
            text-align:center;
            color:#666;
        }

        .badge-hapus{ background:red; color:white; padding:2px 6px; font-size:12px; border-radius:6px; margin-left:5px; }
        .badge-user-hapus{ background:#6b7280; color:white; padding:2px 6px; font-size:12px; border-radius:6px; margin-left:5px; }

        @media(max-width: 1100px){
            .pesanan-top-layout{
                flex-direction:column;
            }

            .pesanan-summary-card{
                width:100%;
                min-width:0;
            }
        }

        @media(max-width: 768px){
            .content-wrapper{
                padding-left:18px;
                padding-right:18px;
            }

            .pesanan-entry{
                grid-template-columns:1fr;
            }

            .bukti-panel{
                border-left:none;
                border-top:1px solid #d6d6d6;
                padding-left:0;
                padding-top:14px;
            }

            .pesanan-main{
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
    <div class="pesanan-page">
        <div class="pesanan-tools">
            <input type="text" id="pesananSearch" class="pesanan-search" placeholder="Cari pesanan, user, produk, resi, atau status...">
        </div>

        <div class="pesanan-top-layout">
            <div class="pesanan-board">
                <div class="pesanan-board-header">Pesanan Masuk</div>
                <div class="pesanan-board-body">
                    @forelse($pesanan->where('status','menunggu_verifikasi') as $p)
                        <div class="pesanan-entry searchable-order" data-search="{{ strtolower(($p->user->name ?? '').' '.($p->alamat ?? '').' '.($p->no_telepon ?? '').' '.($p->metode_pengiriman ?? '').' '.($p->status ?? '').' menunggu verifikasi masuk '.($p->created_at ? $p->created_at->translatedFormat('d F Y H:i') : '').' '.collect($p->detail ?? [])->map(fn($item) => $item->produk->nama ?? '')->implode(' ')) }}">
                            <div class="pesanan-main">
                                <div class="produk-info">
                                    <div class="produk-list">
                                        @forelse($p->detail ?? [] as $d)
                                            <div class="produk-list-item">
                                                @if($d->produk && $d->produk->gambar)
                                                    <img class="produk-cover" src="{{ asset('storage/'.$d->produk->gambar) }}" onclick="preview(this.src)">
                                                @else
                                                    <img class="produk-cover" src="https://via.placeholder.com/80x112">
                                                @endif

                                                <div>
                                                    <h4>
                                                        {{ $d->produk->nama ?? 'Produk sudah dihapus' }}
                                                        @if(!$d->produk || ($d->produk && $d->produk->deleted_at))
                                                            <span class="badge-hapus">Dihapus</span>
                                                        @endif
                                                    </h4>
                                                    <div class="pesanan-meta">
                                                        <p>Jumlah : {{ $d->jumlah }} Barang</p>
                                                        <p>Subtotal : Rp{{ number_format($d->subtotal ?? (($d->produk->harga ?? 0) * ($d->jumlah ?? 0)),0,',','.') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="empty-state">Detail produk tidak tersedia</div>
                                        @endforelse
                                    </div>

                                    <div class="pesanan-meta pesanan-summary-info">
                                        <p>Total Harga : Rp{{ number_format($p->total_harga ?? ($p->detail?->sum('subtotal') ?? 0),0,',','.') }}</p>
                                        <p>
                                            Username :
                                            @if($p->user)
                                                {{ $p->user->name }}
                                                @if($p->user->deleted_at)
                                                    <span class="badge-user-hapus">User dihapus</span>
                                                @endif
                                            @else
                                                <span class="badge-user-hapus">User dihapus</span>
                                            @endif
                                        </p>
                                        <p>Alamat : {{ $p->alamat ?? '-' }}</p>
                                        <p>No Hp : {{ $p->no_telepon ?? '-' }}</p>
                                        <p>Pengiriman : {{ $p->metode_pengiriman ?? '-' }}</p>
                                    </div>

                                    <div class="pesanan-time">
                                        Waktu Pesanan : {{ $p->created_at ? $p->created_at->translatedFormat('d F Y H:i') : '-' }}
                                    </div>

                                    <div class="aksi-row">
                                        <form action="{{ route('staff.pesanan.terima', $p->id) }}" method="POST">
                                            @csrf
                                            <input class="resi-input" type="text" name="no_resi" placeholder="No Resi" required>
                                            <br>
                                            <button class="btn-aksi terima" type="submit">Terima</button>
                                        </form>

                                        <form action="{{ route('staff.pesanan.tolak', $p->id) }}" method="POST">
                                            @csrf
                                            <button class="btn-aksi tolak" type="submit">Tolak</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="bukti-panel">
                                <div class="bukti-label">Bukti Pembayaran :</div>
                                @if($p->bukti_bayar)
                                    <img class="bukti" src="{{ asset('storage/'.$p->bukti_bayar) }}" onclick="preview(this.src)">
                                @else
                                    <div class="bukti-kosong">Tidak ada bukti pembayaran</div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">Tidak ada pesanan masuk</div>
                    @endforelse
                </div>
            </div>

            <div class="pesanan-summary-card">
                <div class="pesanan-summary-logo">
                    <img src="{{ asset('storage/Logo.png') }}" alt="BookHaven">
                    <span>BookHaven</span>
                </div>

                <h3>Total Pesanan Ditanggapi</h3>
                <p>{{ $pesanan->where('status','diterima')->count() }} Pesanan</p>
            </div>
        </div>

        <div class="pesanan-board">
            <div class="pesanan-board-header">Pesanan Ditanggapi</div>
            <div class="pesanan-board-body">
                @forelse($pesanan->where('status','diterima') as $p)
                    <div class="pesanan-entry searchable-order" data-search="{{ strtolower(($p->user->name ?? '').' '.($p->alamat ?? '').' '.($p->no_telepon ?? '').' '.($p->metode_pengiriman ?? '').' '.($p->status ?? '').' diterima terima ditanggapi '.($p->no_resi ?? '').' '.($p->created_at ? $p->created_at->translatedFormat('d F Y H:i') : '').' '.collect($p->detail ?? [])->map(fn($item) => $item->produk->nama ?? '')->implode(' ')) }}">
                        <div class="pesanan-main">
                            <div class="produk-info">
                                <div class="produk-list">
                                    @forelse($p->detail ?? [] as $d)
                                        <div class="produk-list-item">
                                            @if($d->produk && $d->produk->gambar)
                                                <img class="produk-cover" src="{{ asset('storage/'.$d->produk->gambar) }}" onclick="preview(this.src)">
                                            @else
                                                <img class="produk-cover" src="https://via.placeholder.com/80x112">
                                            @endif

                                            <div>
                                                <h4>
                                                    {{ $d->produk->nama ?? 'Produk sudah dihapus' }}
                                                    @if(!$d->produk || ($d->produk && $d->produk->deleted_at))
                                                        <span class="badge-hapus">Dihapus</span>
                                                    @endif
                                                </h4>
                                                <div class="pesanan-meta">
                                                    <p>Jumlah : {{ $d->jumlah }} Barang</p>
                                                    <p>Subtotal : Rp{{ number_format($d->subtotal ?? (($d->produk->harga ?? 0) * ($d->jumlah ?? 0)),0,',','.') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="empty-state">Detail produk tidak tersedia</div>
                                    @endforelse
                                </div>

                                <div class="pesanan-meta pesanan-summary-info">
                                    <p>Total Harga : Rp{{ number_format($p->total_harga ?? ($p->detail?->sum('subtotal') ?? 0),0,',','.') }}</p>
                                    <p>
                                        Username :
                                        @if($p->user)
                                            {{ $p->user->name }}
                                            @if($p->user->deleted_at)
                                                <span class="badge-user-hapus">User dihapus</span>
                                            @endif
                                        @else
                                            <span class="badge-user-hapus">User dihapus</span>
                                        @endif
                                    </p>
                                    <p>Alamat : {{ $p->alamat ?? '-' }}</p>
                                    <p>No Hp : {{ $p->no_telepon ?? '-' }}</p>
                                    <p>No Resi : {{ $p->no_resi ?? '-' }}</p>
                                    <p>Pengiriman : {{ $p->metode_pengiriman ?? '-' }}</p>
                                </div>

                                <div class="pesanan-time">
                                    Waktu Pesanan : {{ $p->created_at ? $p->created_at->translatedFormat('d F Y H:i') : '-' }}
                                </div>

                                <div class="status-chip">Terima</div>
                            </div>
                        </div>

                        <div class="bukti-panel">
                            <div class="bukti-label">Bukti Pembayaran :</div>
                            @if($p->bukti_bayar)
                                <img class="bukti" src="{{ asset('storage/'.$p->bukti_bayar) }}" onclick="preview(this.src)">
                            @else
                                <div class="bukti-kosong">Tidak ada bukti pembayaran</div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="empty-state">Tidak ada pesanan ditanggapi</div>
                @endforelse
            </div>
        </div>

        <div class="pesanan-board">
            <div class="pesanan-board-header">Pesanan Ditolak</div>
            <div class="pesanan-board-body">
                @forelse($pesanan->where('status','tidak_diproses') as $p)
                    <div class="pesanan-entry searchable-order" data-search="{{ strtolower(($p->user->name ?? '').' '.($p->alamat ?? '').' '.($p->no_telepon ?? '').' '.($p->metode_pengiriman ?? '').' '.($p->status ?? '').' tolak ditolak tidak diproses '.($p->created_at ? $p->created_at->translatedFormat('d F Y H:i') : '').' '.collect($p->detail ?? [])->map(fn($item) => $item->produk->nama ?? '')->implode(' ')) }}">
                        <div class="pesanan-main">
                            <div class="produk-info">
                                <div class="produk-list">
                                    @forelse($p->detail ?? [] as $d)
                                        <div class="produk-list-item">
                                            @if($d->produk && $d->produk->gambar)
                                                <img class="produk-cover" src="{{ asset('storage/'.$d->produk->gambar) }}" onclick="preview(this.src)">
                                            @else
                                                <img class="produk-cover" src="https://via.placeholder.com/80x112">
                                            @endif

                                            <div>
                                                <h4>
                                                    {{ $d->produk->nama ?? 'Produk sudah dihapus' }}
                                                    @if(!$d->produk || ($d->produk && $d->produk->deleted_at))
                                                        <span class="badge-hapus">Dihapus</span>
                                                    @endif
                                                </h4>
                                                <div class="pesanan-meta">
                                                    <p>Jumlah : {{ $d->jumlah }} Barang</p>
                                                    <p>Subtotal : Rp{{ number_format($d->subtotal ?? (($d->produk->harga ?? 0) * ($d->jumlah ?? 0)),0,',','.') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="empty-state">Detail produk tidak tersedia</div>
                                    @endforelse
                                </div>

                                <div class="pesanan-meta pesanan-summary-info">
                                    <p>Total Harga : Rp{{ number_format($p->total_harga ?? ($p->detail?->sum('subtotal') ?? 0),0,',','.') }}</p>
                                    <p>
                                        Username :
                                        @if($p->user)
                                            {{ $p->user->name }}
                                            @if($p->user->deleted_at)
                                                <span class="badge-user-hapus">User dihapus</span>
                                            @endif
                                        @else
                                            <span class="badge-user-hapus">User dihapus</span>
                                        @endif
                                    </p>
                                    <p>Alamat : {{ $p->alamat ?? '-' }}</p>
                                    <p>No Hp : {{ $p->no_telepon ?? '-' }}</p>
                                    <p>Pengiriman : {{ $p->metode_pengiriman ?? '-' }}</p>
                                </div>

                                <div class="pesanan-time">
                                    Waktu Pesanan : {{ $p->created_at ? $p->created_at->translatedFormat('d F Y H:i') : '-' }}
                                </div>

                                <div class="status-chip">Tolak</div>
                            </div>
                        </div>

                        <div class="bukti-panel">
                            <div class="bukti-label">Bukti Pembayaran :</div>
                            @if($p->bukti_bayar)
                                <img class="bukti" src="{{ asset('storage/'.$p->bukti_bayar) }}" onclick="preview(this.src)">
                            @else
                                <div class="bukti-kosong">Tidak ada bukti pembayaran</div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="empty-state">Tidak ada pesanan ditolak</div>
                @endforelse
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

<div id="popup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:black;">
    <img id="imgPreview" style="display:block; margin:auto; max-width:80%; margin-top:50px;">
</div>

<script>
function preview(src){
    if(!src) return;
    document.getElementById('popup').style.display='block';
    document.getElementById('imgPreview').src = src;
}

document.getElementById('popup').onclick = function(){
    this.style.display='none';
}

const pesananSearch = document.getElementById('pesananSearch');
const searchableOrders = document.querySelectorAll('.searchable-order');

if (pesananSearch) {
    pesananSearch.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();

        searchableOrders.forEach(order => {
            const text = ((order.dataset.search || '') + ' ' + (order.innerText || '')).toLowerCase();
            order.style.display = text.includes(keyword) ? '' : 'none';
        });
    });
}
</script>

</body>
</html>
