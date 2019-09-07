<?php


namespace App\API;


use Illuminate\Support\ServiceProvider;

class APIServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->singleton('api', function(){
            return new APIResponse();
        });
    }
}