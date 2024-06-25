<?php

use App\Http\Controllers\Dashboards\Admin\Categories\AdminDashboardCategoryController;

Route::controller(AdminDashboardCategoryController::class)->group(function () {
    Route::get('/dashboard/category', 'index')->name('admin.dashboard.category.index');
    Route::post('/dashboard/category', 'store')->name('admin.dashboard.category.store');
    Route::get('/dashboard/category/create', 'create')->name('admin.dashboard.category.create');
    Route::get('/dashboard/category/search', 'search')->name('admin.dashboard.category.search');
    Route::get('/dashboard/category/{id}/edit-actcat', 'editActcat')->name('admin.dashboard.category.edit-actcat');
    Route::get('/dashboard/category/{id}/edit-actgrp', 'editActgrp')->name('admin.dashboard.category.edit-actgrp');
    Route::put('/dashboard/category-actcat', 'updateActcat')->name('admin.dashboard.category.update-actcat');
    Route::put('/dashboard/category-actgrp', 'updateActgrp')->name('admin.dashboard.category.update-actgrp');
    Route::delete('/dashboard/category-actcat/{id}', 'destroyActcat')->name('admin.dashboard.category.destroy-actcat');
    Route::delete('/dashboard/category-actgrp/{id}', 'destroyActgrp')->name('admin.dashboard.category.destroy-actgrp');
    Route::get('/dashboard/category/{id}/show-subitem', 'showSubItem')->name('admin.dashboard.category.show-subitem');
});
