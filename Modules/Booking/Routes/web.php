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
Route::get('admin/bookings/total-price', 'BookingController@getTotalPrice')->name('bookings.total-price');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::post('/bookings/update-status', 'BookingController@updateStatus')->name('bookings.update-status');
    Route::resource('/bookings', 'BookingController');
    Route::resource('/offer-requests', 'OfferRequestController');
    Route::patch('/offer-requests/{id}/complete', 'OfferRequestController@complete')->name('offer-requests.complete');
    Route::resource('/service-requests', 'ServiceRequestController');
    Route::patch('/service-requests/{id}/complete', 'ServiceRequestController@complete')->name('service-requests.complete');
});

