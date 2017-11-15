<?php

namespace Packages\Uber;

use Illuminate\Support\ServiceProvider;

class UberServiceProvider extends ServiceProvider
{

    public function __construct($app)
    {   
        parent::__construct($app);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->handleRoutes();
        $this->handleMigrations();
        $this->handleTranslations();
    }

    /**
     * Register the application services. 
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Cyvelnet\Laravel5Fractal\Laravel5FractalServiceProvider::class);

        $this->loadfacades();
        $this->handleController();
        $this->handleConfigs();
        
    }

    private function handleRoutes() {

        include __DIR__.'/Routes/routes.php';
    }

    private function handleController()
    {
        $this->app->make('Packages\Uber\Controllers\UberController');
    }

    private function handleMigrations()
    {
        $this->publishes([
           __DIR__ . '/../resources/database/migrations' => $this->app->databasePath() . '/migrations'
       ], 'migrations');
    }

    private function handleTranslations()
    {
        $this->loadTranslationsFrom( __DIR__.'/../resources/lang', 'packages');
    }

    private function handleConfigs() 
    {
        $this->mergeConfigFrom(__DIR__.'/../resources/config/messages.php', 'packages');
    }


    private function loadfacades()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();

        $loader->alias('Fractal', '\Cyvelnet\Laravel5Fractal\Facades\Fractal');

        return true;
    }
}
