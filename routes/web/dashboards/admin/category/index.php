<?php

use App\Http\Controllers\Dashboards\Admin\Categories\AdminDashboardCategoryController;

Route::controller(AdminDashboardCategoryController::class)->group(function () {
    Route::get('/dashboard/category', 'index')->name('admin.dashboard.category.index');
    Route::post('/dashboard/category', 'store')->name('admin.dashboard.category.store');
    Route::get('/dashboard/category/create', 'create')->name('admin.dashboard.category.create');
    Route::get('/dashboard/category/search', 'search')->name('admin.dashboard.category.search');
    Route::get('/dashboard/category/{category}/edit', 'editCategory')->name('admin.dashboard.category.edit');
    Route::put('/dashboard/category/{category}', 'updateCategory')->name('admin.dashboard.category.update');
    Route::delete('/dashboard/category/{category}', 'destroyCategory')->name('admin.dashboard.category.destroy');
    Route::get('/dashboard/category/{category}/subitem', 'showSubItem')->name('admin.dashboard.category.subitem');
});
