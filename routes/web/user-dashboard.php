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
    Route::get('/activity/create', 'create')->name('user.activity.create');
    Route::get('/activity/{activity}/edit', 'edit')->name('user.activity.edit');
    Route::put('/activity/{activity}/restore', 'restore')->name('user.activity.restore');
    Route::delete('/activity/{activity}/destroy', 'destroy')->name('user.activity.destroy');
});



// !!!!!!!!!!to do
// rewrite UserPrivatePageController and UserProjectController delete and update routes with put and delete


// personal website routes
Route::controller(UserPrivatePageController::class)->group(function () {
    Route::get('/personal-website/create', 'create')->name('user.personal-website.create');
    Route::get('/personal-website/{id}/edit', 'edit')->name('user.personal-website.edit');
    Route::get('/personal-website/{psite}/restore', 'restore')->name('user.personal-website.restore')->withTrashed();
    Route::get('/personal-website/{psite}/destroy', 'destroy')->name('user.personal-website.destroy');
});

//projects routes
Route::controller(UserProjectController::class)->group(function () {
    Route::get('/project/create', 'create')->name('user.project.create');
    Route::get('/project/{id}/edit', 'edit')->name('user.project.edit');
    Route::get('/project/{project}/restore', 'restore')->name('user.project.restore')->withTrashed();
    Route::get('/project/{project}/destroy', 'destroy')->name('user.project.destroy');
});
