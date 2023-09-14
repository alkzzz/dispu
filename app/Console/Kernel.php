<?php

namespace App\Console;

use App\Jobs\InstagramJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->job(new InstagramJob)->daily();
        $schedule->command('backup:clean')->at('00:00')->timezone('Asia/Makassar');
        $schedule->command('backup:run')->at('00:30')->timezone('Asia/Makassar');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
