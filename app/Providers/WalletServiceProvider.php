<?php

namespace App\Providers;

use App\Services\Wallet;
use App\Services\WalletService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class WalletServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('wallet', function ($app){
           return new WalletService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
