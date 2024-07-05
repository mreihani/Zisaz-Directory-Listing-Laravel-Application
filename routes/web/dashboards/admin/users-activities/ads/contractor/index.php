<?php

use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Contractor\AdminDashboardUsersActivitiesAdsContractorPendingController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Contractor\AdminDashboardUsersActivitiesAdsContractorRejectedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Contractor\AdminDashboardUsersActivitiesAdsContractorVerifiedController;

// routes for verified items
Route::controller(AdminDashboardUsersActivitiesAdsContractorVerifiedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/contractor/verified', 'index')->name('admin.dashboard.users-activities.ads.contractor.verified.index');
    Route::delete('/dashboard/users-activities/ads/contractor/verified/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.contractor.verified.destroy');
    Route::get('/dashboard/users-activities/ads/contractor/verified/search', 'search')->name('admin.dashboard.users-activities.ads.contractor.verified.search');
});

// routes for pending items
Route::controller(AdminDashboardUsersActivitiesAdsContractorPendingController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/contractor/pending', 'index')->name('admin.dashboard.users-activities.ads.contractor.pending.index');
    Route::get('/dashboard/users-activities/ads/contractor/pending/{activity}/edit', 'edit')->name('admin.dashboard.users-activities.ads.contractor.pending.edit');
    Route::put('/dashboard/users-activities/ads/contractor/pending/{activity}', 'update')->name('admin.dashboard.users-activities.ads.contractor.pending.update');
    Route::delete('/dashboard/users-activities/ads/contractor/pending/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.contractor.pending.destroy');
    Route::get('/dashboard/users-activities/ads/contractor/pending/search', 'search')->name('admin.dashboard.users-activities.ads.contractor.pending.search');
});

// routes for rejected items
Route::controller(AdminDashboardUsersActivitiesAdsContractorRejectedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/contractor/rejected', 'index')->name('admin.dashboard.users-activities.ads.contractor.rejected.index');
    Route::delete('/dashboard/users-activities/ads/contractor/rejected/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.contractor.rejected.destroy');
    Route::get('/dashboard/users-activities/ads/contractor/rejected/search', 'search')->name('admin.dashboard.users-activities.ads.contractor.rejected.search');
});





