<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Detection\MobileDetect;

class DeviceDetectionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
                $this->app->singleton(MobileDetect::class, function () {
            return new MobileDetect;
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
