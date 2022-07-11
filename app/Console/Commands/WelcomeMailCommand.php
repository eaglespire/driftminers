<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class WelcomeMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'welcome:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a welcome mail to each new user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Artisan::call('queue:work');
        Log::info('A new user has registered');
    }
}
