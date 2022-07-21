<?php

namespace App\Providers;

use App\Services\PlanServices;
use Illuminate\Support\ServiceProvider;

class PlanServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PlanServices', function (){
            return new PlanServices;
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
