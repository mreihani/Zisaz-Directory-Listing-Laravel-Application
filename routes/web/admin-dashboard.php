<?php

use App\Http\Controllers\Dashboards\Admin\AdminDashboardController;

Route::controller(AdminDashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard.index');
});

