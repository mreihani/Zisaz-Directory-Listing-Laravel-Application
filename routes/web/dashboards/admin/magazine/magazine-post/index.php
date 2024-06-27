<?php

use App\Http\Controllers\Dashboards\Admin\Magazine\MagazinePosts\AdminDashboardMagazinePostController;

Route::controller(AdminDashboardMagazinePostController::class)->group(function () {
    Route::get('/dashboard/magazine/post', 'index')->name('admin.dashboard.magazine.post.index');
    Route::get('/dashboard/magazine/post/create', 'create')->name('admin.dashboard.magazine.post.create');
    Route::post('/dashboard/magazine/post', 'store')->name('admin.dashboard.magazine.post.store');
    Route::get('/dashboard/magazine/post/{magPost}/edit', 'edit')->name('admin.dashboard.magazine.post.edit');
    Route::put('/dashboard/magazine/post/{magPost}', 'update')->name('admin.dashboard.magazine.post.update');
    Route::delete('/dashboard/magazine/post/{magPost}', 'destroy')->name('admin.dashboard.magazine.post.destroy');
    Route::get('/dashboard/magazine/post/search', 'search')->name('admin.dashboard.magazine.post.search');
});


