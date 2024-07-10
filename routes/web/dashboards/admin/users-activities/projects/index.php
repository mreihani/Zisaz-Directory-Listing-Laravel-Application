<?php

use App\Http\Controllers\Dashboards\Admin\UsersActivities\Projects\AdminDashboardUsersActivitiesProjectDeletedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Projects\AdminDashboardUsersActivitiesProjectPendingController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Projects\AdminDashboardUsersActivitiesProjectRejectedController;
use App\Http\Controllers\Dashboards\Admin\UsersActivities\Projects\AdminDashboardUsersActivitiesProjectVerifiedController;

// routes for verified items
Route::controller(AdminDashboardUsersActivitiesProjectVerifiedController::class)->group(function () {
    Route::get('/dashboard/users-activities/project/verified', 'index')->name('admin.dashboard.users-activities.project.verified.index');
    Route::delete('/dashboard/users-activities/project/verified/{project}', 'destroy')->name('admin.dashboard.users-activities.project.verified.destroy');
    Route::get('/dashboard/users-activities/project/verified/search', 'search')->name('admin.dashboard.users-activities.project.verified.search');
});

// routes for pending items
Route::controller(AdminDashboardUsersActivitiesProjectPendingController::class)->group(function () {
    Route::get('/dashboard/users-activities/project/pending', 'index')->name('admin.dashboard.users-activities.project.pending.index');
    Route::get('/dashboard/users-activities/project/pending/{project}/edit', 'edit')->name('admin.dashboard.users-activities.project.pending.edit');
    Route::put('/dashboard/users-activities/project/pending/{project}', 'update')->name('admin.dashboard.users-activities.project.pending.update');
    Route::delete('/dashboard/users-activities/project/pending/{project}', 'destroy')->name('admin.dashboard.users-activities.project.pending.destroy');
    Route::get('/dashboard/users-activities/project/pending/search', 'search')->name('admin.dashboard.users-activities.project.pending.search');
});

// routes for rejected items
Route::controller(AdminDashboardUsersActivitiesProjectRejectedController::class)->group(function () {
    Route::get('/dashboard/users-activities/project/rejected', 'index')->name('admin.dashboard.users-activities.project.rejected.index');
    Route::delete('/dashboard/users-activities/project/rejected/{project}', 'destroy')->name('admin.dashboard.users-activities.project.rejected.destroy');
    Route::get('/dashboard/users-activities/project/rejected/search', 'search')->name('admin.dashboard.users-activities.project.rejected.search');
});

// routes for deleted items
Route::controller(AdminDashboardUsersActivitiesProjectDeletedController::class)->group(function () {
    Route::get('/dashboard/users-activities/project/deleted', 'index')->name('admin.dashboard.users-activities.project.deleted.index');
    Route::put('/dashboard/users-activities/project/deleted/{project}', 'restore')->name('admin.dashboard.users-activities.project.deleted.restore');
    Route::get('/dashboard/users-activities/project/deleted/search', 'search')->name('admin.dashboard.users-activities.project.deleted.search');
});





