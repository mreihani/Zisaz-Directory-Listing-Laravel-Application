<?php

use App\Http\Controllers\Frontend\IndexController;

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'homePage')->name('home-page');
    Route::get('/login', 'userLogin')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/about-us', 'aboutUs')->name('about-us');
    Route::get('/blog', 'blogAll')->name('blog-all');
    Route::get('/blog/{id}', 'blogSingle')->name('blog-single');
    Route::get('/contact-us', 'contactUs')->name('contact-us');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/activity/{slug}', 'activity')->name('activity');
    Route::get('/advertisement', 'getAds')->name('get-ads');
});