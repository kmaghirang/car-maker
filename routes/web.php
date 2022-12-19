<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TypeController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cars', CarsController::class);
Route::resource('color', ColorController::class);
Route::resource('manufacturer', ManufacturerController::class);
Route::resource('type', TypeController::class);

Route::get('logout', [SessionsController::class,'destroy']);  
