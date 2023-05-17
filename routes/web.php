<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ImageTypeController;
use App\Http\Controllers\NationalitiesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VipGroupsController;
use App\Http\Controllers\VipsNameController;
use App\Http\Controllers\VipTitlesController;
use App\Models\images;
use App\Models\VipsName;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
Route::post('getVips', [VipsNameController::class, 'getVipNames'])->name('getVips')->middleware(['auth', 'role:dataEntry']);
Route::resource('images', ImagesController::class)->middleware(['auth', 'role:viewer']);
Route::resource('vipsNames', VipsNameController::class)->middleware(['auth', 'role:dataEntry']);
Route::resource('imageTypes', ImageTypeController::class)->middleware(['auth', 'role:dataEntry']);
Route::post('addVips', [ImagesController::class, 'addVips'])->middleware(['auth', 'role:dataEntry']);
Route::get('/search', [ImagesController::class, 'search'])->name('search')->middleware(['auth', 'role:viewer']);
Route::post('/search', [ImagesController::class, 'getReult'])->middleware(['auth', 'role:viewer']);
//resource for VipTitlesController
Route::resource('vipTitles', VipTitlesController::class)->middleware(['auth', 'role:dataEntry']);
//resource for VipGroupsController
Route::resource('vipGroups', VipGroupsController::class)->middleware(['auth', 'role:dataEntry']);
//resource for NationalitiesController
Route::resource('nationalities', NationalitiesController::class)->middleware(['auth', 'role:dataEntry']);
//resource for UsersController
Route::resource('users', UsersController::class)->middleware(['auth', 'role:admin']);
Route::post('users/SaveRoles/{id}', [UsersController::class,'SaveRole'])->name('users.SaveRoles')->middleware(['auth', 'role:admin']);
Route::get('users/ChangeRoles/{id}', [UsersController::class,'changeRole'])->name('users.ChangeRoles')->middleware(['auth', 'role:admin']);
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
