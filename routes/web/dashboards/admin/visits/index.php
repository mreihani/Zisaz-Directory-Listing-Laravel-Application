<?php

use App\Http\Controllers\Dashboards\Admin\Visits\AdminDashboardVisitController;

Route::controller(AdminDashboardVisitController::class)->group(function () {
    Route::get('/dashboard/visits', 'index')->name('admin.dashboard.visits.index');
    Route::get('/dashboard/visits/history', 'history')->name('admin.dashboard.visits.history.index');
    Route::get('/dashboard/visits/search', 'search')->name('admin.dashboard.visits.search');
    Route::get('/dashboard/visits/export-excel', 'exportExcel')->name('admin.dashboard.visits.export-excel');
    Route::get('/dashboard/visits/chart/iran', 'showIran')->name('admin.dashboard.visits.chart.iran.index');
    Route::get('/dashboard/visits/chart/global', 'showGlobal')->name('admin.dashboard.visits.chart.global.index');
});


