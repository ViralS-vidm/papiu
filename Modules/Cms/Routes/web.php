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


Route::group(['middleware' => 'auth', 'prefix' => 'admin/cms'], function () {
    Route::resource('/image-cms', 'ImageCmsController');
    Route::resource('/config-cms', 'ConfigCmsController')->only('index', 'edit', 'update');
    Route::resource('/meta-cms', 'MetaCmsController')->only('index', 'edit', 'update');
    Route::resource('/video-cms', 'VideoCmsController')->only('index', 'edit', 'update');
});

