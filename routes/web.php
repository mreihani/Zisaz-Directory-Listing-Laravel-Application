<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Intervention\Image\Facades\Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


require __DIR__.'/auth.php';


Route::get('/test2', function(){
    $img = Image::make(('assets/frontend/img/jaban/png.png'))->fit(400)->encode('jpg');
});




