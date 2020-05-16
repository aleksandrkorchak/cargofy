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

Route::get('/', 'LoadController@getLoadsTransportRoutes');
Route::get('/from/{city}', 'LoadController@getLoadsTransportRoutes');
Route::get('/{locale}/from/{city}', 'LoadController@getLoadsTransportRoutes');
Route::get('/{locale}', 'LoadController@getLoadsTransportRoutes');

Route::post('/loads', 'LoadController@store')->name('loads.store');

Route::fallback(function() {
    if(\Illuminate\Support\Facades\Lang::getLocale() == 'en'){
        return redirect('/');
    }
    else{
        return redirect('/' . \Illuminate\Support\Facades\Lang::getLocale());
    }
});

