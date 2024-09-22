<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use App\Models\Frontend\UserModels\Permission\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Check if the 'permissions' table exists in the database
        if (Schema::hasTable('permissions')) {
            foreach (Permission::all() as $permission) {
                Gate::define($permission->title, function($user) use($permission) {
                    return $user->hasPermission($permission);
                });
            }
        }
    }
}
