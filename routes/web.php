<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ImageTypeController;
use App\Http\Controllers\NationalitiesController;
use App\Http\Controllers\VipGroupsController;
use App\Http\Controllers\VipsNameController;
use App\Http\Controllers\VipTitlesController;
use App\Models\images;
use Illuminate\Support\Facades\Artisan;
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
//resource for VipTitlesController
Route::resource('vipTitles', VipTitlesController::class);
//resource for VipGroupsController
Route::resource('vipGroups', VipGroupsController::class);
//resource for NationalitiesController
Route::resource('nationalities', NationalitiesController::class);

Route::get('/dev/migrate', function () {
    Artisan::call('migrate:fresh');
    $dd_output = Artisan::output();
    dd($dd_output);
});
Route::get('/dev/optimize', function () {
    Artisan::call('optimize');
    $dd_output = Artisan::output();
    dd($dd_output);
});

Route::get('/dev/seed', function () {
    Artisan::call('db:seed');
    $dd_output = Artisan::output();
    dd($dd_output);
});
