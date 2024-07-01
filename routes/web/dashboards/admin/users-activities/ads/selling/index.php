<?php

use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Selling\AdminDashboardUsersActivitiesAdsSellingPendingController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Selling\AdminDashboardUsersActivitiesAdsSellingRejectedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Selling\AdminDashboardUsersActivitiesAdsSellingVerifiedController;

// routes for verified items
Route::controller(AdminDashboardUsersActivitiesAdsSellingVerifiedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/selling/verified', 'index')->name('admin.dashboard.users-activities.ads.selling.verified.index');
    Route::delete('/dashboard/users-activities/ads/selling/verified/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.selling.verified.destroy');
    Route::get('/dashboard/users-activities/ads/selling/verified/search', 'search')->name('admin.dashboard.users-activities.ads.selling.verified.search');
});

// routes for pending items
Route::controller(AdminDashboardUsersActivitiesAdsSellingPendingController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/selling/pending', 'index')->name('admin.dashboard.users-activities.ads.selling.pending.index');
    Route::get('/dashboard/users-activities/ads/selling/pending/{activity}/edit', 'edit')->name('admin.dashboard.users-activities.ads.selling.pending.edit');
    Route::put('/dashboard/users-activities/ads/selling/pending/{activity}', 'update')->name('admin.dashboard.users-activities.ads.selling.pending.update');
    Route::delete('/dashboard/users-activities/ads/selling/pending/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.selling.pending.destroy');
    Route::get('/dashboard/users-activities/ads/selling/pending/search', 'search')->name('admin.dashboard.users-activities.ads.selling.pending.search');
});

// routes for rejected items
Route::controller(AdminDashboardUsersActivitiesAdsSellingRejectedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/selling/rejected', 'index')->name('admin.dashboard.users-activities.ads.selling.rejected.index');
    Route::delete('/dashboard/users-activities/ads/selling/rejected/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.selling.rejected.destroy');
    Route::get('/dashboard/users-activities/ads/selling/rejected/search', 'search')->name('admin.dashboard.users-activities.ads.selling.rejected.search');
});





