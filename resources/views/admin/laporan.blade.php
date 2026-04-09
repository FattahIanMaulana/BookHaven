<!DOCTYPE html>
<html>
<head>
    <title>Laporan Admin - BookHaven</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI';
        }

        body {
            background: #fff;
            color: #111827;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: #E5E7EB;
            padding: 15px 60px;
            display: flex;
            align-items: center;
            z-index: 9999;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-center {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 35px;
            flex: 1;
        }

        .nav-center a {
            color: #000;
            font-weight: 600;
            border-bottom: 1px solid #000;
            padding-bottom: 2px;
        }

        .logo-img {
            width: 40px;
            height: auto;
        }

        .logo {
            font-size: 20px;
            font-weight: 700;
            color: #1E3A5F;
        }

        .nav-right {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn {
            background: #1E3A5F;
            color: #fff;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .btn:hover {
            opacity: 0.92;
        }

        .btn-logout {
            background: #dc2626;
        }

        .content-wrapper {
            width: min(1180px, calc(100% - 48px));
            margin: 0 auto;
            padding-top: 118px;
            padding-bottom: 46px;
            flex: 1 0 auto;
        }

        .laporan-generate-card,
        .hasil-laporan-card {
            background: #fff;
            border: 1px solid #d7d7d7;
            border-radius: 24px;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.12);
            overflow: hidden;
        }

        .laporan-generate-card {
            max-width: 640px;
            margin: 0 auto 34px;
        }

        .card-heading {
            background: #efefef;
            color: #111;
            text-align: center;
            font-size: 16px;
            font-weight: 800;
            padding: 14px 18px;
            border-bottom: 1px solid #dfdfdf;
        }

        .laporan-generate-body {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            align-items: center;
            min-height: 260px;
        }

        .laporan-generate-left,
        .laporan-generate-right {
            padding: 26px 28px;
        }

        .laporan-generate-left {
            display: flex;
            justify-content: center;
            align-items: center;
            border-right: 1px solid #d8d8d8;
        }

        .brand-stack {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .brand-stack img {
            width: 104px;
            height: auto;
            object-fit: contain;
        }

        .brand-stack h2 {
            font-size: 20px;
            font-weight: 800;
            color: #1E3A5F;
        }

        .laporan-generate-right {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            gap: 14px;
        }

        .laporan-generate-right p {
            max-width: 260px;
            font-size: 13px;
            line-height: 1.45;
            color: #202020;
        }

        .laporan-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            width: 100%;
        }

        .laporan-form-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            width: 100%;
        }

        .date-input {
            width: 180px;
            border: 1px solid #bfc4ca;
            border-radius: 999px;
            padding: 9px 14px;
            font-size: 13px;
            outline: none;
            background: #fff;
            color: #374151;
        }

        .hasil-laporan-card {
            margin-top: 10px;
        }

        .hasil-laporan-body {
            padding: 28px 30px 34px;
        }

        .laporan-summary {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size: 16px;
            line-height: 1.45;
            margin-bottom: 28px;
        }

        .laporan-divider {
            border: none;
            border-top: 1px solid #cfd2d7;
            margin-bottom: 26px;
        }

        .laporan-section {
            margin-bottom: 30px;
        }

        .laporan-section:last-child {
            margin-bottom: 0;
        }

        .laporan-section h3 {
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 14px;
            color: #111827;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 640px;
        }

        table, th, td {
            border: 1px solid #7b7b7b;
        }

        th, td {
            padding: 10px 12px;
            font-size: 14px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #f3f4f6;
            font-weight: 700;
        }

        .badge-user-hapus {
            background: #6b7280;
            color: white;
            padding: 3px 8px;
            font-size: 12px;
            border-radius: 999px;
            display: inline-block;
        }

        .empty-text {
            color: #6b7280;
        }

        .footer {
            background: #E5E7EB;
            padding: 40px 60px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-top: auto;
        }

        .footer-left p:last-child {
            margin-top: 25px;
            font-size: 13px;
            color: #555;
        }

        .footer-left a {
            color: #111827;
        }

        .footer-right {
            text-align: center;
            margin-top: 6.5px;
        }

        .footer-right h3 {
            margin-bottom: 14px;
            font-size: 24px;
            font-weight: 700;
        }

        .social-icons {
            display: flex;
            gap: 14px;
            justify-content: flex-end;
        }

        .social-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .social-icon img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        @media (max-width: 900px) {
            .navbar {
                padding: 15px 22px;
                flex-wrap: wrap;
                gap: 12px;
            }

            .nav-center {
                order: 3;
                width: 100%;
                flex-wrap: wrap;
                gap: 16px;
            }

            .content-wrapper {
                width: min(100% - 28px, 1180px);
                padding-top: 150px;
            }

            .laporan-generate-body {
                grid-template-columns: 1fr;
            }

            .laporan-generate-left {
                border-right: none;
                border-bottom: 1px solid #d8d8d8;
            }

            .hasil-laporan-body {
                padding: 24px 18px 28px;
            }

            .laporan-summary {
                font-size: 15px;
            }

            .laporan-section h3 {
                font-size: 19px;
            }

            .footer {
                padding: 30px 22px;
                gap: 24px;
            }
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="nav-left">
        <img src="{{ asset('storage/Logo.png') }}" class="logo-img" alt="Logo BookHaven">
        <a href="{{ route('admin.dashboard') }}" class="logo">BookHaven</a>
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
            <button class="btn btn-logout">Logout</button>
        </form>
    </div>
</div>

<div class="content-wrapper">
    <div class="laporan-generate-card">
        <div class="card-heading">Tampilkan Laporan</div>

        <div class="laporan-generate-body">
            <div class="laporan-generate-left">
                <div class="brand-stack">
                    <img src="{{ asset('storage/Logo.png') }}" alt="Logo BookHaven">
                    <h2>BookHaven</h2>
                </div>
            </div>

            <div class="laporan-generate-right">
                <p>Masukkan tanggal dan lihat laporan dari rentang tanggal yang kamu masukkan.</p>

                <form method="GET" class="laporan-form">
                    <div class="laporan-form-row">
                        <input class="date-input" type="date" name="from" value="{{ request('from') }}" required>
                        <input class="date-input" type="date" name="to" value="{{ request('to') }}" required>
                    </div>

                    <button class="btn" type="submit">Tampilkan</button>
                </form>
            </div>
        </div>
    </div>

    @if(request('from') && request('to'))
        @php
            $tanggalAwal = \Carbon\Carbon::parse(request('from'))->translatedFormat('d F Y');
            $tanggalAkhir = \Carbon\Carbon::parse(request('to'))->translatedFormat('d F Y');
            $totalPendapatan = 0;
        @endphp

        <div class="hasil-laporan-card">
            <div class="card-heading">Hasil Laporan</div>

            <div class="hasil-laporan-body">
                <div class="laporan-summary">
                    <p><strong>Total Transaksi :</strong> {{ $totalTransaksi ?? 0 }} ({{ $totalBarang ?? 0 }} Barang)</p>
                    <p><strong>Total Penjualan :</strong> Rp{{ number_format($totalPenjualan ?? 0, 0, ',', '.') }}</p>
                    <p><strong>Total Stok :</strong> {{ $totalStok ?? 0 }}</p>
                    <p><strong>Tanggal :</strong> {{ $tanggalAwal }} - {{ $tanggalAkhir }}</p>
                </div>

                <hr class="laporan-divider">

                <div class="laporan-section">
                    <h3>Laporan Penjualan</h3>

                    <div class="table-wrap">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Produk</th>
                                <th>Total Terjual</th>
                            </tr>

                            @forelse($penjualan as $produkId => $items)
                                @php
                                    $first = $items->first();
                                    $nominalTerjual = $items->sum('total_harga');
                                    $totalPendapatan += $nominalTerjual;
                                @endphp

                                @if($first)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ optional($first->created_at)->format('d-m-Y') }}</td>
                                        <td>{{ optional($first->produk)->nama ?? 'Produk dihapus' }}</td>
                                        <td>{{ number_format($nominalTerjual, 0, ',', '.') }}</td>
                                    </tr>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="4" class="empty-text">Tidak ada data penjualan.</td>
                                </tr>
                            @endforelse

                            <tr>
                                <td colspan="3"><strong>Total Pendapatan</strong></td>
                                <td><strong>{{ number_format($totalPendapatan, 0, ',', '.') }}</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="laporan-section">
                    <h3>Laporan Transaksi</h3>

                    <div class="table-wrap">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Username</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                            </tr>

                            @forelse($transaksi as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($t->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        @if($t->user)
                                            {{ $t->user->name }}
                                        @else
                                            <span class="badge-user-hapus">User dihapus</span>
                                        @endif
                                    </td>
                                    <td>{{ optional($t->produk)->nama ?? 'Produk dihapus' }}</td>
                                    <td>{{ $t->jumlah ?? 0 }}</td>
                                    <td>{{ number_format($t->total_harga ?? 0, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty-text">Tidak ada transaksi.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>

                <div class="laporan-section">
                    <h3>Laporan Status Dibatalkan</h3>

                    <div class="table-wrap">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Username</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                            </tr>

                            @forelse($laporanDibatalkan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ optional($item->created_at)->format('d-m-Y') }}</td>
                                    <td>
                                        @if($item->user)
                                            {{ $item->user->name }}
                                        @else
                                            <span class="badge-user-hapus">User dihapus</span>
                                        @endif
                                    </td>
                                    <td>{{ optional($item->produk)->nama ?? 'Produk dihapus' }}</td>
                                    <td>{{ $item->jumlah ?? 0 }}</td>
                                    <td>{{ number_format($item->total_harga ?? 0, 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty-text">Tidak ada laporan status dibatalkan.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>

                <div class="laporan-section">
                    <h3>Laporan Stok</h3>

                    <div class="table-wrap">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Stok Tersisa</th>
                            </tr>

                            @forelse($produk as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nama ?? '-' }}</td>
                                    <td>{{ $p->stok ?? 0 }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="empty-text">Tidak ada produk.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="footer">
    <div class="footer-left">
        <h3>Tentang BookHaven</h3>
        <p><a href="{{ route('admin.about') }}">Tentang Kami</a></p>
        <p><a href="https://wa.me/6281317705750" target="_blank">Hubungi Kami</a></p>
        <p class="copyright">
            &copy; 2026, BookHaven - Sistem Informasi E-Commerce Buku
        </p>
    </div>

    <div class="footer-right">
        <h3>Follow Us</h3>

        <div class="social-icons">
            <div class="social-icon">
                <a href="https://www.facebook.com/share/14YfqmAGjkC/" target="_blank">
                    <img src="{{ asset('storage/facebook.png') }}" alt="Facebook">
                </a>
            </div>

            <div class="social-icon">
                <a href="https://www.instagram.com/fattahian06?igsh=MzgwZmN2MGNqOGNs" target="_blank">
                    <img src="{{ asset('storage/instagram.jpg') }}" alt="Instagram">
                </a>
            </div>

            <div class="social-icon">
                <a href="https://youtube.com/@fattahian0611?si=M6IYal89_DCRV9Q7" target="_blank">
                    <img src="{{ asset('storage/youtube.png') }}" alt="YouTube">
                </a>
            </div>

            <div class="social-icon">
                <a href="https://tiktok.com/@fattah_ian_maulana" target="_blank">
                    <img src="{{ asset('storage/tiktok.avif') }}" alt="TikTok">
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>

