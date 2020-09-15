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

Route::prefix('')->group(function () {
    Route::get('/', 'FrontPageController@home')->name('frontpage.home');
    Route::get('/products', 'FrontPageController@productList')->name('frontpage.products');
    Route::get('/products/{id}', 'FrontPageController@productDetail')->name('frontpage.product-detail');
    Route::get('/introduction', 'FrontPageController@introduction')->name('frontpage.intro');
    Route::get('/offer', 'FrontPageController@offers')->name('frontpage.offer');
    Route::get('/contact', 'FrontPageController@contact')->name('frontpage.contact');
    Route::get('/agency', 'FrontPageController@agency')->name('frontpage.agency');
    Route::get('/policy', 'FrontPageController@policy')->name('frontpage.policy');
    Route::get('/condition', 'FrontPageController@condition')->name('frontpage.condition');
    Route::get('/search-result', 'FrontPageController@searchResult');
    Route::get('/book', 'FrontPageController@book');
    Route::get('/service', 'FrontPageController@service')->name('frontpage.service');
    Route::get('/service-confirm', 'FrontPageController@serviceConfirmPersonal');
    Route::post('/service-confirm', 'FrontPageController@serviceConfirmPersonal')->name('frontpage.service-confirm-view');
    Route::post('/service-confirm-done', 'FrontPageController@serviceConfirm')->name('frontpage.service-confirm');
    Route::get('/book', 'FrontPageController@book')->name('frontpage.book');
    Route::get('/service', 'FrontPageController@service')->name('frontpage.service');
    Route::get('/gallery', 'FrontPageController@gallery')->name('frontpage.gallery');
    Route::get('/booking-list', 'FrontPageController@bookList')->name('frontpage.booking-list');
    Route::get('/confirm-personal', 'FrontPageController@confirmPersonalView')->name('frontpage.confirm-personal');
    Route::post('/confirm-personal', 'FrontPageController@confirmPersonal')->name('frontpage.confirm-personal');
    Route::get('/booking-done', 'FrontPageController@doneBookView');
    Route::post('/booking-done', 'FrontPageController@doneBook')->name('frontpage.booking-done');
    Route::get('/offer-confirm', 'FrontPageController@offerConfirmPersonal');
    Route::post('/offer-confirm', 'FrontPageController@offerConfirmPersonal')->name('frontpage.offer-confirm-view');
    Route::post('/offer-confirm-done', 'FrontPageController@offerConfirm')->name('frontpage.offer-confirm');
    Route::post('/contact', 'FrontPageController@createContact')->name('frontpage.contact-create');
    Route::post('/agency', 'FrontPageController@createAgency')->name('frontpage.agencies-create');
});
