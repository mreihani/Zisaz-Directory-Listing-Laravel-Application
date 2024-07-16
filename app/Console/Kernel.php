<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Remove users which have not verified their phone number and the token has been expired
        //$schedule->command('app:remove-not-validated-users')->daily();

        // Remove expired sms tokens
        $schedule->command('app:clear-expired-sms-tokes')->daily();
        
        // Delete soft-deleted activities and their folders after 6 month
        $schedule->command('app:force-delete-trashed-activities')->daily();

        // Delete soft-deleted private websites and their folders after 6 month
        $schedule->command('app:force-delete-trashed-private-websites')->daily();

        // Delete soft-deleted projects and their folders after 6 month
        $schedule->command('app:force-delete-trashed-projects')->daily();

        // update visitors charts daily
        $schedule->command('app:update-visitor-charts')->daily();

        // generate site maps
        $schedule->command('app:site-map-pages')->daily();
        $schedule->command('app:site-map-mag-post')->daily();
        $schedule->command('app:site-map-activity')->daily();
        $schedule->command('app:site-map-private-website')->daily();
        $schedule->command('app:site-map-project')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
