<?php

use App\Http\Controllers\Dashboards\Admin\Media\AdminDashboardMediaController;

Route::controller(AdminDashboardMediaController::class)->group(function () {
    Route::get('/dashboard/media', 'index')->name('admin.dashboard.media.index');
    Route::get('/dashboard/media/create', 'create')->name('admin.dashboard.media.create');
    Route::post('/dashboard/media', 'store')->name('admin.dashboard.media.store');
    Route::delete('/dashboard/media/{media}', 'destroy')->name('admin.dashboard.media.destroy');
    Route::get('/dashboard/media/search', 'search')->name('admin.dashboard.media.search');
});
