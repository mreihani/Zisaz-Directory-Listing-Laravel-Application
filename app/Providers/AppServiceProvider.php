<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\Models\Frontend\UserModels\Activity\Activity;
use App\Observers\Frontend\UserModels\Activity\ActivityObserver;
use App\Models\Frontend\UserModels\Activity\AdsRegistration\Selling;
use App\Observers\Frontend\UserModels\Activity\AdsRegistration\SellingObserver;

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
        //
    }
}
