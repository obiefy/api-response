<?php

namespace Obiefy\API;

use Illuminate\Support\ServiceProvider;
use Obiefy\Api\Contracts\ApiInterface;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Register API class.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApiInterface::class, function () {
            return new ApiResponse();
        });
    }

    /**
     * Bootstrap API resources.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();

        $this->registerHelpers();

        $this->publishes([
            __DIR__.'/../config/api.php' => config_path('api.php'),
        ], 'api-response');
    }

    /**
     * Set Config files.
     */
    protected function setupConfig()
    {
        $path = realpath($raw = __DIR__.'/../config/api.php') ?: $raw;
        $this->mergeConfigFrom($path, 'api');
    }

    /**
     * Register helpers.
     */
    protected function registerHelpers()
    {
        if (file_exists($helperFile = __DIR__.'/helpers.php')) {
            require_once $helperFile;
        }
    }
}
