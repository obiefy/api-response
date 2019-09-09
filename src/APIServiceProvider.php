<?php

namespace Obiefy\API;
use Illuminate\Support\ServiceProvider;

class APIServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->singleton('api', function(){
            return new APIResponse();
        });
    }

    public function boot()
    {
        $this->publishConfig();
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/config/api.php' => config_path('api.php')
        ], 'api-config');
    }
}