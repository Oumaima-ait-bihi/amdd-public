<?php

namespace App\Providers;

use App\Services\MCPClientService;
use Illuminate\Support\ServiceProvider;

class OllamaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MCPClientService::class, function ($app) {
            return new MCPClientService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
