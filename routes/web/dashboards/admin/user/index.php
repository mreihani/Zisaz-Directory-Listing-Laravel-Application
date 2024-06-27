<?php

use App\Http\Controllers\Dashboards\Admin\Users\AdminDashboardUserController;

Route::controller(AdminDashboardUserController::class)->group(function () {
    Route::get('/dashboard/users', 'index')->name('admin.dashboard.users.index');
    Route::get('/dashboard/user/create', 'create')->name('admin.dashboard.user.create');
    Route::post('/dashboard/user', 'store')->name('admin.dashboard.user.store');
    Route::get('/dashboard/user/{id}/edit', 'edit')->name('admin.dashboard.user.edit');
    Route::put('/dashboard/user/{user}', 'update')->name('admin.dashboard.user.update');
    Route::delete('/dashboard/user/{user}', 'destroy')->name('admin.dashboard.user.destroy');
    Route::get('/dashboard/users/search', 'search')->name('admin.dashboard.users.search');
});


