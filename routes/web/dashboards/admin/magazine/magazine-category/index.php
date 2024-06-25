<?php

use App\Http\Controllers\Dashboards\Admin\Magazine\MagazineCategories\AdminDashboardMagazineCategoryController;

Route::controller(AdminDashboardMagazineCategoryController::class)->group(function () {
    Route::get('/dashboard/magazine/category', 'index')->name('admin.dashboard.magazine.category.index');
    Route::get('/dashboard/magazine/category/create', 'create')->name('admin.dashboard.magazine.category.create');
    Route::post('/dashboard/magazine/category', 'store')->name('admin.dashboard.magazine.category.store');
    Route::get('/dashboard/magazine/category/{magCategory}/edit', 'edit')->name('admin.dashboard.magazine.category.edit');
    Route::put('/dashboard/magazine/category{magCategory}', 'update')->name('admin.dashboard.magazine.category.update');
    Route::delete('/dashboard/magazine/category/{magCategory}', 'destroy')->name('admin.dashboard.magazine.category.destroy');
    Route::get('/dashboard/magazine/category/search', 'search')->name('admin.dashboard.magazine.category.search');
});
