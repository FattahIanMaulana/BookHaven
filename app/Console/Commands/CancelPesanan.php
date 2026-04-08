<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pesanan;
use Carbon\Carbon;

class CancelPesanan extends Command
{
    protected $signature = 'pesanan:cancel';
    protected $description = 'Auto cancel pesanan lebih dari 12 jam';

    public function handle()
    {
        $batasWaktu = Carbon::now()->subHours(12);

        $pesanan = Pesanan::where('status', 'menunggu_verifikasi')
            ->where('created_at', '<=', $batasWaktu)
            ->get();

        foreach ($pesanan as $p) {
            $p->update([
                'status' => 'dibatalkan_sistem'
            ]);
        }

        $this->info('Pesanan kadaluarsa berhasil dibatalkan');
    }
}
