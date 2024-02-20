<?php

use App\Http\Controllers\Frontend\Profile\UserProfileMyResumeController;
use App\Http\Controllers\Frontend\Profile\UserProfileSettingsController;
use App\Http\Controllers\Frontend\Profile\UserProfileSavedJobsController;
use App\Http\Controllers\Frontend\Profile\UserProfileNotificationsController;

Route::controller(UserProfileSettingsController::class)->group(function () {
    Route::get('/dashboard/profile-settings', 'index')->name('user.dashboard.profile-settings.index');
});

Route::controller(UserProfileMyResumeController::class)->group(function () {
    Route::get('/dashboard/my-resume', 'index')->name('user.dashboard.my-resume.index');
});

Route::controller(UserProfileSavedJobsController::class)->group(function () {
    Route::get('/dashboard/saved-jobs', 'index')->name('user.dashboard.saved-jobs.index');
});

Route::controller(UserProfileNotificationsController::class)->group(function () {
    Route::get('/dashboard/account-notifications', 'index')->name('user.dashboard.account-notifications.index');
});



