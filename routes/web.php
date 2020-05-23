<?php

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



Route::group(['prefix' => App\Http\Middleware\Locale::getLocale()], function (){
    Route::get('/', 'LoadController@index');
    Route::get('/from/{city:slug}', 'CityLoadController');
});

Route::post('/loads', 'LoadController@store')->name('loads.store');

