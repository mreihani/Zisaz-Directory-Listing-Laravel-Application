<?php

use App\Http\Controllers\Frontend\Project\UserProjectController;
use App\Http\Controllers\Frontend\Activity\UserActivityController;
use App\Http\Controllers\Frontend\PrivatePage\UserPrivatePageController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileAdController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileProjectController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileSettingsController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfilePrivatePageController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileNotificationsController;

// User profile routes
Route::controller(UserProfileSettingsController::class)->group(function () {
    Route::get('/dashboard/profile-settings', 'index')->name('user.dashboard.profile-settings.index');
});
Route::controller(UserProfileAdController::class)->group(function () {
    Route::get('/dashboard/saved-ads', 'index')->name('user.dashboard.saved-ads.index');
});
Route::controller(UserProfileProjectController::class)->group(function () {
    Route::get('/dashboard/saved-projects', 'index')->name('user.dashboard.saved-projects.index');
});
Route::controller(UserProfilePrivatePageController::class)->group(function () {
    Route::get('/dashboard/saved-personal-websites', 'index')->name('user.dashboard.saved-personal-websites.index');
});
Route::controller(UserProfileNotificationsController::class)->group(function () {
    Route::get('/dashboard/account-notifications', 'index')->name('user.dashboard.account-notifications.index');
});

// ads routes
Route::controller(UserActivityController::class)->group(function () {
    Route::get('/activity/activity/create', 'create')->name('user.activity.create');
});
Route::controller(UserActivityController::class)->group(function () {
    Route::get('/activity/{id}/edit', 'edit')->name('user.activity.edit');
});

// personal website routes
Route::controller(UserPrivatePageController::class)->group(function () {
    Route::get('/personal-website/create', 'create')->name('user.personal-website.create');
});
Route::controller(UserPrivatePageController::class)->group(function () {
    Route::get('/personal-website/{id}/edit', 'edit')->name('user.personal-website.edit');
});

//projects routes
Route::controller(UserProjectController::class)->group(function () {
    Route::get('/project/create', 'create')->name('user.project.create');
});
Route::controller(UserProjectController::class)->group(function () {
    Route::get('/project/{id}/edit', 'edit')->name('user.project.edit');
});