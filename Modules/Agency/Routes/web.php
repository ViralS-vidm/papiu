<?php

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

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/agencies', 'AgencyController@index')->name('agencies.index');
    Route::post('/agencies/update-status', 'AgencyController@updateStatus')->name('agencies.update-status');
    Route::delete('/agencies/{id}', 'AgencyController@destroy')->name('agencies.destroy');
});
