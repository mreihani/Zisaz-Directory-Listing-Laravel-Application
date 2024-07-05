<?php

use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Investment\AdminDashboardUsersActivitiesAdsInvestmentPendingController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Investment\AdminDashboardUsersActivitiesAdsInvestmentRejectedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Ads\Investment\AdminDashboardUsersActivitiesAdsInvestmentVerifiedController;

// routes for verified items
Route::controller(AdminDashboardUsersActivitiesAdsInvestmentVerifiedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/investment/verified', 'index')->name('admin.dashboard.users-activities.ads.investment.verified.index');
    Route::delete('/dashboard/users-activities/ads/investment/verified/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.investment.verified.destroy');
    Route::get('/dashboard/users-activities/ads/investment/verified/search', 'search')->name('admin.dashboard.users-activities.ads.investment.verified.search');
});

// routes for pending items
Route::controller(AdminDashboardUsersActivitiesAdsInvestmentPendingController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/investment/pending', 'index')->name('admin.dashboard.users-activities.ads.investment.pending.index');
    Route::get('/dashboard/users-activities/ads/investment/pending/{activity}/edit', 'edit')->name('admin.dashboard.users-activities.ads.investment.pending.edit');
    Route::put('/dashboard/users-activities/ads/investment/pending/{activity}', 'update')->name('admin.dashboard.users-activities.ads.investment.pending.update');
    Route::delete('/dashboard/users-activities/ads/investment/pending/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.investment.pending.destroy');
    Route::get('/dashboard/users-activities/ads/investment/pending/search', 'search')->name('admin.dashboard.users-activities.ads.investment.pending.search');
});

// routes for rejected items
Route::controller(AdminDashboardUsersActivitiesAdsInvestmentRejectedController::class)->group(function () {
    Route::get('/dashboard/users-activities/ads/investment/rejected', 'index')->name('admin.dashboard.users-activities.ads.investment.rejected.index');
    Route::delete('/dashboard/users-activities/ads/investment/rejected/{activity}', 'destroy')->name('admin.dashboard.users-activities.ads.investment.rejected.destroy');
    Route::get('/dashboard/users-activities/ads/investment/rejected/search', 'search')->name('admin.dashboard.users-activities.ads.investment.rejected.search');
});





