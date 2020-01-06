<?php

namespace Obiefy\API;

use Illuminate\Support\ServiceProvider;

class APIServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('api.response', function () {
            return new APIResponse();
        });
    }

    public function boot()
    {
        $this->setupConfig();

        $this->registerHelpers();

        $this->publishes([
            __DIR__.'/config/api.php' => config_path('api.php'),
        ], 'api-response');
    }

    protected function setupConfig()
    {
        $path = realpath($raw = __DIR__.'/config/api.php') ?: $raw;
        $this->mergeConfigFrom($path, 'api');
    }

    protected function registerHelpers()
    {
        if (file_exists($helperFile = __DIR__.'/helpers.php')) {
            require_once $helperFile;
        }
    }
}
