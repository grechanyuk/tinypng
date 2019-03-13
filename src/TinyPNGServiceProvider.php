<?php

namespace Grechanyuk\TinyPNG;

use Illuminate\Support\ServiceProvider;

class TinyPNGServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tinypng.php', 'tinypng');

        // Register the service the package provides.
        $this->app->singleton('tinypng', function ($app) {
            return new TinyPNG;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['tinypng'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/tinypng.php' => config_path('tinypng.php'),
        ], 'tinypng.config');
    }
}
