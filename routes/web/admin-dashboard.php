<?php

use App\Http\Controllers\Dashboards\Admin\AdminDashboardController;
use App\Http\Controllers\Dashboards\Admin\AdminDashboardProfileController;
use App\Http\Controllers\Dashboards\Admin\AccountSettings\AdminDashboardAccountSecurityController;
use App\Http\Controllers\Dashboards\Admin\AccountSettings\AdminDashboardAccountSettingsController;

Route::controller(AdminDashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('admin.dashboard.index');
});

Route::controller(AdminDashboardProfileController::class)->group(function () {
    Route::get('/dashboard/profile', 'index')->name('admin.dashboard.profile.index');
});

Route::controller(AdminDashboardAccountSettingsController::class)->group(function () {
    Route::get('/dashboard/account-settings', 'index')->name('admin.dashboard.account-settings.account.index');
});

Route::controller(AdminDashboardAccountSecurityController::class)->group(function () {
    Route::get('/dashboard/account-security', 'index')->name('admin.dashboard.account-settings.security.index');
});


