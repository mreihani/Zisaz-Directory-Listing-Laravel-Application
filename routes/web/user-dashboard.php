<?php

use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileMyResumeController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileSettingsController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileSavedJobsController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileContactInfoController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileNotificationsController;
use App\Http\Controllers\Frontend\Profile\ProfilePages\UserProfileLicenseController;


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
Route::controller(UserProfileContactInfoController::class)->group(function () {
    Route::get('/dashboard/contact-info', 'index')->name('user.dashboard.contact-info.index');
});
Route::controller(UserProfileLicenseController::class)->group(function () {
    Route::get('/dashboard/license', 'index')->name('user.dashboard.license.index');
});