<?php

namespace Packages\Uber;

use Illuminate\Support\ServiceProvider;

class UberServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';

        $this->loadMigrationsFrom(__DIR__.'Packages\Uber\resources\database\migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Packages\Uber\UberController');
    }
}
