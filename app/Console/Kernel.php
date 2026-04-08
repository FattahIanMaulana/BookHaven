<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        // Load semua command custom
        $this->load(_DIR_.'/Commands');

        // Load route console kalau ada
        if (file_exists(base_path('routes/console.php'))) {
            require base_path('routes/console.php');
        }
    }

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        try {
            // 🔥 Cek apakah command tersedia
            $commands = collect(Artisan::all())->keys();

            if ($commands->contains('pesanan:cancel')) {
                $schedule->command('pesanan:cancel')->everyFiveMinutes();
            }

        } catch (\Throwable $e) {
            // ❗ Jangan bikin scheduler crash
            // Optional: bisa log kalau mau
            // \Log::error($e->getMessage());
        }
    }
}
