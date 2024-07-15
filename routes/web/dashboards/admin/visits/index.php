<?php

use App\Http\Controllers\Dashboards\Admin\Visits\AdminDashboardVisitController;

Route::controller(AdminDashboardVisitController::class)->group(function () {
    Route::get('/dashboard/visits', 'index')->name('admin.dashboard.visits.index');
    Route::get('/dashboard/visits/history', 'history')->name('admin.dashboard.visits.history.index');
    Route::get('/dashboard/visits/search', 'search')->name('admin.dashboard.visits.search');
    Route::get('/dashboard/visits/export-excel', 'exportExcel')->name('admin.dashboard.visits.export-excel');
    Route::get('/dashboard/visits/chart', 'show')->name('admin.dashboard.visits.chart.index');
});


