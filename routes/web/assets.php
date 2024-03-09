<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Assets\AssetController;

Route::get('assets/{user_id}/{file}', AssetController::class)->name('assets');