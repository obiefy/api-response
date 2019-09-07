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
        $this->setConfig();
    }

    protected function setConfig()
    {
        $path =  realpath($raw = __DIR__.'/config/api.php') ?: $raw;
        $this->mergeConfigFrom($path, 'api');
    }
}