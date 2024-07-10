<?php

use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\All\AdminDashboardUsersActivitiesAdsAllDeletedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\All\AdminDashboardUsersActivitiesAdsAllPendingController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\All\AdminDashboardUsersActivitiesAdsAllRejectedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\All\AdminDashboardUsersActivitiesAdsAllVerifiedController;

// routes for verified items
Route::controller(AdminDashboardUsersActivitiesAdsAllVerifiedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/all/verified', 'index')->name('admin.dashboard.users-activities.ads.all.verified.index');
    Route::delete('/dashboard/users-activities/ads/all/verified/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.all.verified.destroy');
    Route::get('/dashboard/users-activities/ads/all/verified/search', 'search')->name('admin.dashboard.users-activities.ads.all.verified.search');
});

// routes for pending items
Route::controller(AdminDashboardUsersActivitiesAdsAllPendingController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/all/pending', 'index')->name('admin.dashboard.users-activities.ads.all.pending.index');
    Route::get('/dashboard/users-activities/ads/all/pending/{activity}/edit', 'edit')->name('admin.dashboard.users-activities.ads.all.pending.edit');
    Route::put('/dashboard/users-activities/ads/all/pending/{activity}', 'update')->name('admin.dashboard.users-activities.ads.all.pending.update');
    Route::delete('/dashboard/users-activities/ads/all/pending/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.all.pending.destroy');
    Route::get('/dashboard/users-activities/ads/all/pending/search', 'search')->name('admin.dashboard.users-activities.ads.all.pending.search');
});

// routes for rejected items
Route::controller(AdminDashboardUsersActivitiesAdsAllRejectedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/all/rejected', 'index')->name('admin.dashboard.users-activities.ads.all.rejected.index');
    Route::delete('/dashboard/users-activities/ads/all/rejected/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.all.rejected.destroy');
    Route::get('/dashboard/users-activities/ads/all/rejected/search', 'search')->name('admin.dashboard.users-activities.ads.all.rejected.search');
});

// routes for deleted items
Route::controller(AdminDashboardUsersActivitiesAdsAllDeletedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/all/deleted', 'index')->name('admin.dashboard.users-activities.ads.all.deleted.index');
    Route::put('/dashboard/users-activities/ads/all/deleted/{activity}', 'restore')->name('admin.dashboard.users-activities.ads.all.deleted.restore');
    Route::get('/dashboard/users-activities/ads/all/deleted/search', 'search')->name('admin.dashboard.users-activities.ads.all.deleted.search');
});





