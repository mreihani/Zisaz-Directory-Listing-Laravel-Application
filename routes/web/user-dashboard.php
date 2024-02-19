<?php

use App\Http\Controllers\Frontend\UserDashboardController;

Route::controller(UserDashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('user.dashboard.index');
});


