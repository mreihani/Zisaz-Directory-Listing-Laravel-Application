<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Assets\AssetController;

Route::controller(AssetController::class)->group(function () {
    Route::get('assets/{activity_id}/{file}', 'getLicenseItemsSingleImage')->name('get-license-item-single-image');
    Route::get('assets/{activity_id}', 'getLicenseItemsZip')->name('get-license-item-zip');
});