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
    Route::get('/feedbacks', 'FeedbackController@index')->name('feedbacks.index');
    Route::post('/feedbacks/update-status', 'FeedbackController@updateStatus')->name('feedbacks.update-status');
    Route::delete('/feedbacks/{id}', 'FeedbackController@destroy')->name('feedbacks.destroy');
});
