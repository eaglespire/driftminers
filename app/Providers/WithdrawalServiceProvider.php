<?php

namespace App\Providers;

use App\Services\WithdrawalServices;
use Illuminate\Support\ServiceProvider;

class WithdrawalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('WithdrawalServices', function (){
            return new WithdrawalServices;
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
