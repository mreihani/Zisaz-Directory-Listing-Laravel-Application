<?php

use App\Http\Controllers\Dashboards\Admin\Banners\AdminDashboardHomeSliderOneController;
use App\Http\Controllers\Dashboards\Admin\Banners\AdminDashboardHomeTopBannerController;
use App\Http\Controllers\Dashboards\Admin\Banners\AdminDashboardHomeMiddleBannerOneController;

Route::controller(AdminDashboardHomeTopBannerController::class)->group(function () {
    Route::get('/dashboard/dynamic-banners/home-top-banner', 'index')->name('admin.dashboard.dynamic-banners.home-top-banner.index');
    Route::post('/dashboard/dynamic-banners/home-top-banner', 'store')->name('admin.dashboard.dynamic-banners.home-top-banner.store');
});

Route::controller(AdminDashboardHomeMiddleBannerOneController::class)->group(function () {
    Route::get('/dashboard/dynamic-banners/home-middle-one-banner', 'index')->name('admin.dashboard.dynamic-banners.home-middle-one-banner.index');
    Route::post('/dashboard/dynamic-banners/home-middle-one-banner', 'store')->name('admin.dashboard.dynamic-banners.home-middle-one-banner.store');
});

Route::controller(AdminDashboardHomeSliderOneController::class)->group(function () {
    Route::get('/dashboard/dynamic-banners/home-slider-one-banner', 'index')->name('admin.dashboard.dynamic-banners.home-slider-one-banner.index');
    Route::post('/dashboard/dynamic-banners/home-slider-one-banner', 'store')->name('admin.dashboard.dynamic-banners.home-slider-one-banner.store');
});