<?php

namespace App\Providers;

use App\Services\TransactionHistoryServices;
use Illuminate\Support\ServiceProvider;

class TransactionHistoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('TransactionHistoryServices', function(){
            return new TransactionHistoryServices;
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
