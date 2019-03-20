<?php

namespace HenriqueRamos\Cloudflare;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        $this->registerMiddleware();
    }

    protected function registerMiddleware()
    {
        $this->app['router']->pushMiddlewareToGroup('web', Middleware::class);
        $this->app['router']->pushMiddlewareToGroup('api', Middleware::class);
        $this->app['router']->middleware('cloudflareip', Middleware::class);
    }
}
