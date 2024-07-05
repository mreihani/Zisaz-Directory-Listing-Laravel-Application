<?php

use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Bid\AdminDashboardUsersActivitiesAdsBidPendingController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Bid\AdminDashboardUsersActivitiesAdsBidRejectedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Bid\AdminDashboardUsersActivitiesAdsBidVerifiedController;

// routes for verified items
Route::controller(AdminDashboardUsersActivitiesAdsBidVerifiedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/bid/verified', 'index')->name('admin.dashboard.users-activities.ads.bid.verified.index');
    Route::delete('/dashboard/users-activities/ads/bid/verified/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.bid.verified.destroy');
    Route::get('/dashboard/users-activities/ads/bid/verified/search', 'search')->name('admin.dashboard.users-activities.ads.bid.verified.search');
});

// routes for pending items
Route::controller(AdminDashboardUsersActivitiesAdsBidPendingController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/bid/pending', 'index')->name('admin.dashboard.users-activities.ads.bid.pending.index');
    Route::get('/dashboard/users-activities/ads/bid/pending/{activity}/edit', 'edit')->name('admin.dashboard.users-activities.ads.bid.pending.edit');
    Route::put('/dashboard/users-activities/ads/bid/pending/{activity}', 'update')->name('admin.dashboard.users-activities.ads.bid.pending.update');
    Route::delete('/dashboard/users-activities/ads/bid/pending/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.bid.pending.destroy');
    Route::get('/dashboard/users-activities/ads/bid/pending/search', 'search')->name('admin.dashboard.users-activities.ads.bid.pending.search');
});

// routes for rejected items
Route::controller(AdminDashboardUsersActivitiesAdsBidRejectedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/bid/rejected', 'index')->name('admin.dashboard.users-activities.ads.bid.rejected.index');
    Route::delete('/dashboard/users-activities/ads/bid/rejected/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.bid.rejected.destroy');
    Route::get('/dashboard/users-activities/ads/bid/rejected/search', 'search')->name('admin.dashboard.users-activities.ads.bid.rejected.search');
});





