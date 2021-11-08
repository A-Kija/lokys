<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RandomSumServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RandomSumService::class, function ($app) {
            return new RandomSumService;
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
