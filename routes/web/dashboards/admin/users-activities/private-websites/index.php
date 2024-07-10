<?php

use App\Http\Controllers\Dashboards\Admin\UsersActivities\PrivateWebsites\AdminDashboardUsersActivitiesPrivateWebsiteDeletedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\PrivateWebsites\AdminDashboardUsersActivitiesPrivateWebsitePendingController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\PrivateWebsites\AdminDashboardUsersActivitiesPrivateWebsiteRejectedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\PrivateWebsites\AdminDashboardUsersActivitiesPrivateWebsiteVerifiedController;

// routes for verified items
Route::controller(AdminDashboardUsersActivitiesPrivateWebsiteVerifiedController::class)->group(function () {
    Route::get('/dashboard/users-activities/private-website/verified', 'index')->name('admin.dashboard.users-activities.private-website.verified.index');
    Route::delete('/dashboard/users-activities/private-website/verified/{psite}', 'destroy')->name('admin.dashboard.users-activities.private-website.verified.destroy');
    Route::get('/dashboard/users-activities/private-website/verified/search', 'search')->name('admin.dashboard.users-activities.private-website.verified.search');
});

// routes for pending items
Route::controller(AdminDashboardUsersActivitiesPrivateWebsitePendingController::class)->group(function () {
    Route::get('/dashboard/users-activities/private-website/pending', 'index')->name('admin.dashboard.users-activities.private-website.pending.index');
    Route::get('/dashboard/users-activities/private-website/pending/{psite}/edit', 'edit')->name('admin.dashboard.users-activities.private-website.pending.edit');
    Route::put('/dashboard/users-activities/private-website/pending/{psite}', 'update')->name('admin.dashboard.users-activities.private-website.pending.update');
    Route::delete('/dashboard/users-activities/private-website/pending/{psite}', 'destroy')->name('admin.dashboard.users-activities.private-website.pending.destroy');
    Route::get('/dashboard/users-activities/private-website/pending/search', 'search')->name('admin.dashboard.users-activities.private-website.pending.search');
});

// routes for rejected items
Route::controller(AdminDashboardUsersActivitiesPrivateWebsiteRejectedController::class)->group(function () {
    Route::get('/dashboard/users-activities/private-website/rejected', 'index')->name('admin.dashboard.users-activities.private-website.rejected.index');
    Route::delete('/dashboard/users-activities/private-website/rejected/{psite}', 'destroy')->name('admin.dashboard.users-activities.private-website.rejected.destroy');
    Route::get('/dashboard/users-activities/private-website/rejected/search', 'search')->name('admin.dashboard.users-activities.private-website.rejected.search');
});

// routes for deleted items
Route::controller(AdminDashboardUsersActivitiesPrivateWebsiteDeletedController::class)->group(function () {
    Route::get('/dashboard/users-activities/private-website/deleted', 'index')->name('admin.dashboard.users-activities.private-website.deleted.index');
    Route::put('/dashboard/users-activities/private-website/deleted/{psite}', 'restore')->name('admin.dashboard.users-activities.private-website.deleted.restore');
    Route::get('/dashboard/users-activities/private-website/deleted/search', 'search')->name('admin.dashboard.users-activities.private-website.deleted.search');
});





