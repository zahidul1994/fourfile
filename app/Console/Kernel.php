<?php

namespace App\Console;

use App\Console\Commands\Billgenerate;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    'App\Console\Commands\Billgenerate',
    'App\Console\Commands\Billcalculation',
    'App\Console\Commands\Smsbalance',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
          $schedule->command('telescope:prune')->daily();
        //$schedule->command('work:billgenerate')->everyMinute();
        $schedule->command('work:Billcalculation')->monthlyOn(1, '0:00');
         $schedule->command('work:billgenerate')->monthlyOn(1, '1:00');
         $schedule->command('work:smsbalance')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
