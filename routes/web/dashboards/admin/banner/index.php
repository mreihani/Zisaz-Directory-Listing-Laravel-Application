<?php

use App\Http\Controllers\Dashboards\Admin\Banners\AdminDashboardAdsSliderOneController;
use App\Http\Controllers\Dashboards\Admin\Banners\AdminDashboardHomeSliderOneController;
use App\Http\Controllers\Dashboards\Admin\Banners\AdminDashboardHomeTopBannerController;
use App\Http\Controllers\Dashboards\Admin\Banners\AdminDashboardPsiteSliderOneController;
use App\Http\Controllers\Dashboards\Admin\Banners\AdminDashboardProjectSliderOneController;
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

Route::controller(AdminDashboardPsiteSliderOneController::class)->group(function () {
    Route::get('/dashboard/dynamic-banners/psite-slider-one-banner', 'index')->name('admin.dashboard.dynamic-banners.psite-slider-one-banner.index');
    Route::post('/dashboard/dynamic-banners/psite-slider-one-banner', 'store')->name('admin.dashboard.dynamic-banners.psite-slider-one-banner.store');
});

Route::controller(AdminDashboardProjectSliderOneController::class)->group(function () {
    Route::get('/dashboard/dynamic-banners/project-slider-one-banner', 'index')->name('admin.dashboard.dynamic-banners.project-slider-one-banner.index');
    Route::post('/dashboard/dynamic-banners/project-slider-one-banner', 'store')->name('admin.dashboard.dynamic-banners.project-slider-one-banner.store');
});

Route::controller(AdminDashboardAdsSliderOneController::class)->group(function () {
    Route::get('/dashboard/dynamic-banners/ads-slider-one-banner', 'index')->name('admin.dashboard.dynamic-banners.ads-slider-one-banner.index');
    Route::post('/dashboard/dynamic-banners/ads-slider-one-banner', 'store')->name('admin.dashboard.dynamic-banners.ads-slider-one-banner.store');
});
