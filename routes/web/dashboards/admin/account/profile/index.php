<?php

use App\Http\Controllers\Dashboards\Admin\AdminDashboardProfileController;

Route::controller(AdminDashboardProfileController::class)->group(function () {
    Route::get('/dashboard/profile', 'index')->name('admin.dashboard.profile.index');
});