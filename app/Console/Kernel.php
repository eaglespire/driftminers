<?php

namespace App\Console;

use App\Jobs\WelcomeMailJob;
use App\Services\MiningServices;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //$schedule->command('queue:work')->everyFiveMinutes()->runInBackground();
        //$schedule->command('welcome')->everyMinute();
//
//        $schedule->call(function (){
//           Log::info('This is called every minute');
//        })->everyMinute()->when(function (){
//            return true;
//        });
        $schedule->call(function ($duration,$amount,$roi){
            Artisan::call('start:mining', [$duration,$amount,$roi]);
        })->everyMinute();
        $schedule->command('start:mining',) ;
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
