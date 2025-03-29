<?php

namespace Zhylon\MegapiClient;

use Illuminate\Support\ServiceProvider;
use Zhylon\MegapiClient\Support\Facades\MegApi;

class MegApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // merge services config
        $this->mergeConfigFrom(__DIR__.'/../config/services.php', 'services');
    }

    public function register()
    {
        $this->app->singleton('megapi', function ($app) {
            return new MegApiClient(config('services.megapi'));
        });

        $this->app->alias('megapi', MegApi::class);
    }
}
