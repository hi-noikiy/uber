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

        // $this->handleMigrations();

        $this->loadMigrationsFrom(__DIR__.'/Packages/Uber/resources/database/migrations');
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

    // private function handleMigrations() {

    //     $this->publishes([__DIR__ . '/migrations' => base_path('resources/database/migrations')]);
    // }
}
