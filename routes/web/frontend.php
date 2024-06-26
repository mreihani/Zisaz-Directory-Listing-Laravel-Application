<?php

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\FrontEndPages\MagPagesController;
use App\Http\Controllers\Frontend\FrontEndPages\ProjectPagesController;
use App\Http\Controllers\Frontend\FrontEndPages\ActivityPagesController;
use App\Http\Controllers\Frontend\FrontEndPages\PersonalWebsitePagesContoller;

// general frontend pages routes
Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'homePage')->name('home-page');
    Route::get('/login', 'userLogin')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/about-us', 'aboutUs')->name('about-us');
    Route::get('/blog', 'blogAll')->name('blog-all');
    Route::get('/blog/{id}', 'blogSingle')->name('blog-single');
    Route::get('/contact-us', 'contactUs')->name('contact-us');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/support', 'support')->name('support');
});

// advertisement pages routes
Route::controller(ActivityPagesController::class)->group(function () {
    Route::get('/activity-item/{slug}', 'activity')->name('activity');
    Route::get('/activities', 'getActivties')->name('get-activities');
});

// personal website pages routes
Route::controller(PersonalWebsitePagesContoller::class)->group(function () {
    Route::get('/portal/{slug}', 'site')->name('site');
});

// project pages routes
Route::controller(ProjectPagesController::class)->group(function () {
    Route::get('/project-item/{slug}', 'project')->name('project');
});

// mag pages routes
Route::controller(MagPagesController::class)->group(function () {
    Route::get('/mag-item/{slug}', 'mag')->name('mag');
    Route::get('/mag', 'getMags')->name('get-mags');
});