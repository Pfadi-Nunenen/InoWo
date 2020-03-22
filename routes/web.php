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

Route::redirect('/', '/overwatch', 301);

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::any('/overwatch', 'OverwatchController@index')->name('overwatch');

    Route::any('/users', 'UsersController@index')->name('users');
    Route::get('/users/add', 'UsersController@create')->name('add-users');
    Route::post('/users/store', 'UsersController@store')->name('store-users');
    Route::get('/users/edit/{uid}', 'UsersController@edit')->name('edit-users');
    Route::post('/users/update/{uid}', 'UsersController@update')->name('update-users');
    Route::get('/users/destroy/{uid}', 'UsersController@destroy')->name('destroy-users');

    Route::any('/transactions', 'PointTransactionController@index')->name('transactions');
    Route::get('/transactions/add', 'PointTransactionController@create')->name('add-transactions');
    Route::post('/transactions/store', 'PointTransactionController@store')->name('store-transactions');
    Route::get('/transactions/edit/{trid}', 'PointTransactionController@edit')->name('edit-transactions');
    Route::post('/transactions/update/{trid}', 'PointTransactionController@update')->name('update-transactions');
    Route::get('/transactions/destroy/{trid}', 'PointTransactionController@destroy')->name('destroy-transactions');

    Route::any('/credit', 'EmergencyController@index')->name('credit');
    Route::get('/credit/add', 'EmergencyController@create')->name('add-numbers');
    Route::post('/credit/store', 'EmergencyController@store')->name('store-numbers');
    Route::get('/credit/edit/{nid}', 'EmergencyController@edit')->name('edit-numbers');
    Route::post('/credit/update/{nid}', 'EmergencyController@update')->name('update-numbers');
    Route::get('/credit/destroy/{nid}', 'EmergencyController@destroy')->name('destroy-numbers');
});
