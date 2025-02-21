<?php

declare(strict_types=1);

namespace Riidme\Laravel;

use Illuminate\Support\ServiceProvider;

class RiidmeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/riidme.php' => config_path('riidme.php'),
        ], 'riidme-config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/riidme.php', 'riidme');

        $this->app->singleton(RiidmeManager::class, function ($app) {
            return new RiidmeManager($app);
        });

        $this->app->alias(RiidmeManager::class, 'riidme');
    }
} 