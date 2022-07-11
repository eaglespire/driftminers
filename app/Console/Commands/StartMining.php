<?php

namespace App\Console\Commands;

use App\Services\MiningServices;
use Illuminate\Console\Command;

class StartMining extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:mining {data*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $arguments = $this->arguments();
        $duration = $arguments[0];
        $amountInvested = $arguments[1];
        $roi = $arguments[2];
        $newMining = new MiningServices($duration,$amountInvested,$roi,1);

        return $newMining->getCompoundAmount();
    }
}
