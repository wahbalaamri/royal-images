<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ImageTypeController;
use App\Http\Controllers\VipsNameController;
use App\Models\images;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
//  app()->setLocale('ar');
    return view('system.home');
});

Route::resource('images', ImagesController::class);
Route::resource('vipsNames', VipsNameController::class);
Route::resource('imageTypes', ImageTypeController::class);
Route::post('addVips',[ImagesController::class,'addVips']);
Route::get('/search',[ImagesController::class,'search'])->name('search');
Route::post('/search',[ImagesController::class,'getReult']);