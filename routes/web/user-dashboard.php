<?php

use App\Http\Controllers\Frontend\Activity\UserActivityController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileSettingsController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileNotificationsController;

Route::controller(UserProfileSettingsController::class)->group(function () {
    Route::get('/dashboard/profile-settings', 'index')->name('user.dashboard.profile-settings.index');
});
Route::controller(UserProfileNotificationsController::class)->group(function () {
    Route::get('/dashboard/account-notifications', 'index')->name('user.dashboard.account-notifications.index');
});
Route::controller(UserActivityController::class)->group(function () {
    Route::get('/create-activity', 'index')->name('user.create-activity.index');
});
