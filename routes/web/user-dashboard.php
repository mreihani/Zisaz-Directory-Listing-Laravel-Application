<?php

use App\Http\Controllers\Frontend\UserController;

Route::controller(UserController::class)->group(function () {
    Route::get('dashboard', 'dashboard')->name('dashboard');
});