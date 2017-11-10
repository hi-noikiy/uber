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
        $this->handleRoutes();
        $this->handleMigrations();
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

    private function handleRoutes() {

        include __DIR__.'/routes.php';
    }

    public function handleMigrations()
    {
        $this->publishes([
           __DIR__ . '/../../resources/database/migrations' => $this->app->databasePath() . '/migrations'
       ], 'migrations');
    }
}
