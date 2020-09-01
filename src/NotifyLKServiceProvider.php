<?php

namespace ApiChef\NotifyLK;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Foundation\Application;

class NotifyLKServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/notify-lk.php' => config_path('notify-lk.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/notify-lk.php',
            'notify-lk'
        );

        $this->app->singleton('pay-here', function (Application $app): Client {
            return $app->make(Client::class);
        });
    }
}
