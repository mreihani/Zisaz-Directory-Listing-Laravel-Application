<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

            Route::middleware('web')
            ->group(base_path('routes/web.php'));

            Route::middleware('web')
            ->group(base_path('routes/web/frontend.php'));

            Route::middleware(['web','auth.user'])
            ->group(base_path('routes/web/user-dashboard.php'));

            // admin dashboard home page
            Route::middleware(['web','auth','role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/home/index.php'));

            // admin dashboard profile page
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/account/profile/index.php'));

            // admin dashboard account settings page
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/account/account-settings/index.php'));

            // admin dashboard categories page
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/category/index.php'));

            // admin dashboard banners
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/banner/index.php'));

            // admin dashboard magazine categories
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/magazine/magazine-category/index.php'));

            // admin dashboard magazine posts
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/magazine/magazine-post/index.php'));

            // admin dashboard media
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/media/index.php'));

            // admin dashboard user
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/user/index.php'));

            // admin dashboard users-activities all ads
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/users-activities/ads/all/index.php'));

            // admin dashboard users-activities ads selling
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/users-activities/ads/selling/index.php'));

            // admin dashboard users-activities ads employment
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/users-activities/ads/employment/index.php'));

            // admin dashboard users-activities ads investment
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/users-activities/ads/investment/index.php'));

            // admin dashboard users-activities ads bid
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/users-activities/ads/bid/index.php'));

            // admin dashboard users-activities ads inquiry
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/users-activities/ads/inquiry/index.php'));

            // admin dashboard users-activities ads contractor
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/users-activities/ads/contractor/index.php'));

            // admin dashboard users-activities private websites
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/users-activities/private-websites/index.php'));

            // admin dashboard users-activities projects
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/users-activities/projects/index.php'));

            // admin dashboard visits
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/visits/index.php'));

            // admin dashboard permissions
            Route::middleware(['web','auth', 'role'])
            ->prefix('admin')
            ->group(base_path('routes/web/dashboards/admin/permissions/index.php'));

            Route::middleware(['web', 'auth'])
                ->group(base_path('routes/web/assets.php'));
        });
    }
}
