<?php

use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Employment\AdminDashboardUsersActivitiesAdsEmploymentPendingController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Employment\AdminDashboardUsersActivitiesAdsEmploymentRejectedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Employment\AdminDashboardUsersActivitiesAdsEmploymentVerifiedController;

// routes for verified items
Route::controller(AdminDashboardUsersActivitiesAdsEmploymentVerifiedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/employment/verified', 'index')->name('admin.dashboard.users-activities.ads.employment.verified.index');
    Route::delete('/dashboard/users-activities/ads/employment/verified/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.employment.verified.destroy');
    Route::get('/dashboard/users-activities/ads/employment/verified/search', 'search')->name('admin.dashboard.users-activities.ads.employment.verified.search');
});

// routes for pending items
Route::controller(AdminDashboardUsersActivitiesAdsEmploymentPendingController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/employment/pending', 'index')->name('admin.dashboard.users-activities.ads.employment.pending.index');
    Route::get('/dashboard/users-activities/ads/employment/pending/{activity}/edit', 'edit')->name('admin.dashboard.users-activities.ads.employment.pending.edit');
    Route::put('/dashboard/users-activities/ads/employment/pending/{activity}', 'update')->name('admin.dashboard.users-activities.ads.employment.pending.update');
    Route::delete('/dashboard/users-activities/ads/employment/pending/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.employment.pending.destroy');
    Route::get('/dashboard/users-activities/ads/employment/pending/search', 'search')->name('admin.dashboard.users-activities.ads.employment.pending.search');
});

// routes for rejected items
Route::controller(AdminDashboardUsersActivitiesAdsEmploymentRejectedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/employment/rejected', 'index')->name('admin.dashboard.users-activities.ads.employment.rejected.index');
    Route::delete('/dashboard/users-activities/ads/employment/rejected/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.employment.rejected.destroy');
    Route::get('/dashboard/users-activities/ads/employment/rejected/search', 'search')->name('admin.dashboard.users-activities.ads.employment.rejected.search');
});





