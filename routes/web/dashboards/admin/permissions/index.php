<?php

use App\Http\Controllers\Dashboards\Admin\Permissions\AdminDashboardPermisssionController;

Route::controller(AdminDashboardPermisssionController::class)->group(function () {
    Route::get('/dashboard/permissions', 'index')->name('admin.dashboard.permissions.index');
    Route::post('/dashboard/permissions', 'store')->name('admin.dashboard.permissions.store');
});


