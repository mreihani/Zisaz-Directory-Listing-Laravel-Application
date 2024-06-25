<?php

use App\Http\Controllers\Dashboards\Admin\AccountSettings\AdminDashboardAccountSecurityController;
use App\Http\Controllers\Dashboards\Admin\AccountSettings\AdminDashboardAccountSettingsController;

Route::controller(AdminDashboardAccountSettingsController::class)->group(function () {
    Route::get('/dashboard/account-settings', 'index')->name('admin.dashboard.account-settings.account.index');
});

Route::controller(AdminDashboardAccountSecurityController::class)->group(function () {
    Route::get('/dashboard/account-security', 'index')->name('admin.dashboard.account-settings.security.index');
});