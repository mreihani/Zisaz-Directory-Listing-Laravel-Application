<?php

use App\Http\Controllers\Dashboards\Admin\AdminDashboardController;
use App\Http\Controllers\Dashboards\Admin\AdminDashboardProfileController;
use App\Http\Controllers\Dashboards\Admin\Categories\AdminDashboardCategoryController;
use App\Http\Controllers\Dashboards\Admin\AccountSettings\AdminDashboardAccountSecurityController;
use App\Http\Controllers\Dashboards\Admin\AccountSettings\AdminDashboardAccountSettingsController;
use App\Http\Controllers\Dashboards\Admin\Banners\AdminDashboardHomeTopBannerController;

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

Route::controller(AdminDashboardCategoryController::class)->group(function () {
    Route::get('/dashboard/category', 'index')->name('admin.dashboard.category.index');
    Route::post('/dashboard/category', 'store')->name('admin.dashboard.category.store');
    Route::get('/dashboard/category/create', 'create')->name('admin.dashboard.category.create');
    Route::get('/dashboard/category/search', 'search')->name('admin.dashboard.category.search');
    Route::get('/dashboard/category/{id}/edit-actcat', 'editActcat')->name('admin.dashboard.category.edit-actcat');
    Route::get('/dashboard/category/{id}/edit-actgrp', 'editActgrp')->name('admin.dashboard.category.edit-actgrp');
    Route::put('/dashboard/category-actcat', 'updateActcat')->name('admin.dashboard.category.update-actcat');
    Route::put('/dashboard/category-actgrp', 'updateActgrp')->name('admin.dashboard.category.update-actgrp');
    Route::get('/dashboard/category-actcat/{id}/destroy', 'destroyActcat')->name('admin.dashboard.category.destroy-actcat');
    Route::get('/dashboard/category-actgrp/{id}/destroy', 'destroyActgrp')->name('admin.dashboard.category.destroy-actgrp');
    Route::get('/dashboard/category/{id}/show-subitem', 'showSubItem')->name('admin.dashboard.category.show-subitem');
});

Route::controller(AdminDashboardHomeTopBannerController::class)->group(function () {
    Route::get('/dashboard/dynamic-banners/home-top-banner', 'index')->name('admin.dashboard.dynamic-banners.home-top-banner.index');
    Route::post('/dashboard/dynamic-banners/home-top-banner', 'store')->name('admin.dashboard.dynamic-banners.home-top-banner.store');
});


