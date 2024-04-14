<?php

use App\Http\Controllers\Frontend\IndexController;

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'homePage')->name('home-page');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/jobs', 'jobs')->name('jobs');
    Route::get('/job/{id}', 'jobSingle')->name('job-single');
    Route::get('/about-us', 'aboutUs')->name('about-us');
    Route::get('/blog', 'blogAll')->name('blog-all');
    Route::get('/blog/{id}', 'blogSingle')->name('blog-single');
    Route::get('/contact-us', 'contactUs')->name('contact-us');
    Route::get('/faq', 'faq')->name('faq');
});