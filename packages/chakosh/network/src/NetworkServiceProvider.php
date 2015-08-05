<?php

namespace Chakosh\Network;

use Illuminate\Support\ServiceProvider;

class NetworkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Views
         */
        $this->loadViewsFrom(__DIR__.'/views', 'network');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/chakosh/network'),
        ]);

        /**
         * Routes
         */
        include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Chakosh\Network\NetworkController');
    }
}
