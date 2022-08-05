<?php

namespace App\Providers;

use App\Services\Wallet;
use App\Services\WalletServices;
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
        $this->app->bind('WalletServices', function ($app){
           return new WalletServices;
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
