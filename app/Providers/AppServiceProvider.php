<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (strtolower($this->app->environment()) == 'local') {
            if (!empty($providers = config('app.dev_providers'))) {
                foreach ($providers as $provider) {
                    $this->app->register($provider);
                }
            }
            if (!empty($aliases = config('app.dev_aliases'))) {
                foreach ($aliases as $alias => $facade) {
                    $this->app->alias($alias, $facade);
                }
            }
        }
    }
}
