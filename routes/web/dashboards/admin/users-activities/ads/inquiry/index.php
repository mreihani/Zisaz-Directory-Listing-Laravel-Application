<?php

use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Inquiry\AdminDashboardUsersActivitiesAdsInquiryPendingController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Inquiry\AdminDashboardUsersActivitiesAdsInquiryRejectedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Inquiry\AdminDashboardUsersActivitiesAdsInquiryVerifiedController;

// routes for verified items
Route::controller(AdminDashboardUsersActivitiesAdsInquiryVerifiedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/inquiry/verified', 'index')->name('admin.dashboard.users-activities.ads.inquiry.verified.index');
    Route::delete('/dashboard/users-activities/ads/inquiry/verified/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.inquiry.verified.destroy');
    Route::get('/dashboard/users-activities/ads/inquiry/verified/search', 'search')->name('admin.dashboard.users-activities.ads.inquiry.verified.search');
});

// routes for pending items
Route::controller(AdminDashboardUsersActivitiesAdsInquiryPendingController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/inquiry/pending', 'index')->name('admin.dashboard.users-activities.ads.inquiry.pending.index');
    Route::get('/dashboard/users-activities/ads/inquiry/pending/{activity}/edit', 'edit')->name('admin.dashboard.users-activities.ads.inquiry.pending.edit');
    Route::put('/dashboard/users-activities/ads/inquiry/pending/{activity}', 'update')->name('admin.dashboard.users-activities.ads.inquiry.pending.update');
    Route::delete('/dashboard/users-activities/ads/inquiry/pending/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.inquiry.pending.destroy');
    Route::get('/dashboard/users-activities/ads/inquiry/pending/search', 'search')->name('admin.dashboard.users-activities.ads.inquiry.pending.search');
});

// routes for rejected items
Route::controller(AdminDashboardUsersActivitiesAdsInquiryRejectedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/inquiry/rejected', 'index')->name('admin.dashboard.users-activities.ads.inquiry.rejected.index');
    Route::delete('/dashboard/users-activities/ads/inquiry/rejected/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.inquiry.rejected.destroy');
    Route::get('/dashboard/users-activities/ads/inquiry/rejected/search', 'search')->name('admin.dashboard.users-activities.ads.inquiry.rejected.search');
});





