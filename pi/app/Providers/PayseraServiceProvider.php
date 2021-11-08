<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PayseraService;

class PayseraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PayseraService::class, function ($app) {
            return new PayseraService;
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
