<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // This line set the Cloudflare's IP as a trusted proxy 
        Request::setTrustedProxies(
            ['REMOTE_ADDR'], 
            Request::HEADER_X_FORWARDED_FOR
        );
    }
}
