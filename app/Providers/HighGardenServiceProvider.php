<?php

namespace App\Providers;

use App\Interfaces\CryptoInterface;
use App\Interfaces\DepositInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\SubscriptionInterface;
use App\Interfaces\WalletInterface;
use App\Repositories\CryptoRepository;
use App\Repositories\DepositRepository;
use App\Repositories\PlanRepository;
use App\Repositories\SubscriptionRepository;
use App\Repositories\WalletRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class HighGardenServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PlanRepositoryInterface::class,PlanRepository::class);
        $this->app->bind(CryptoInterface::class,CryptoRepository::class);
        $this->app->bind(WalletInterface::class, WalletRepository::class);
        $this->app->bind(DepositInterface::class,DepositRepository::class);
        $this->app->bind(SubscriptionInterface::class,SubscriptionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('subscribed', function (){
            return "<?php
                    if (\Illuminate\Support\Facades\Schema::hasTable('subscriptions')) {
                        if (\App\Models\Subscriber::where('user_id',\Illuminate\Support\Facades\Auth::id())->first()){
                        return 'disabled';
                        }
                        return null;
                    }
                    ?>";
        });
    }
    public function provides()
    {
        return [
            PlanRepositoryInterface::class,
            CryptoInterface::class,
            WalletInterface::class,
            DepositInterface::class,
            SubscriptionInterface::class,
        ];
    }
}
