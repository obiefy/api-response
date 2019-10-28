<?php

namespace Obiefy\API;

use Illuminate\Support\ServiceProvider;
use Obiefy\API\Facades\API;

class APIServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('api', function () {
            return new APIResponse();
        });
    }

    public function boot()
    {
        $this->setupConfig();

        $this->registerHelpers();

        $this->registerMacros();

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

    protected function registerMacros()
    {
        // check if config file contains extra methods
        if (config()->has('api.methods')) {

            // looping inside all methods
            foreach (config('api.methods') as $method) {

                // start adding macros
                API::macro($method['method'], function ($message = '', $data = []) use ($method) {

                    // get default message if message not exist
                    if (empty($message)) {
                        $message = $method['message'];
                    }

                    return API::response($method['code'], $message, $data);
                });
            }
        }
    }
}
