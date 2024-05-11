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

Route::prefix('authorizenetpayment')->middleware('auth')->group(function() {
    Route::get('/', 'AuthorizeNetPaymentController@index');
    Route::get('create', 'AuthorizeNetPaymentController@create')->name('authorizenetpayment.create');
    Route::post('store', 'AuthorizeNetPaymentController@store')->name('authorizenetpayment.store');
    Route::get('edit/{id}', 'AuthorizeNetPaymentController@edit')->name('authorizenetpayment.edit');
    Route::post('update', 'AuthorizeNetPaymentController@update')->name('authorizenetpayment.update');
    Route::get('delete/{id}', 'AuthorizeNetPaymentController@destroy')->name('authorizenetpayment.delete');
    Route::post('update-status', 'AuthorizeNetPaymentController@updateStatus')->name('authorizenetpayment.updateStatus');
});
