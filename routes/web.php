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

Route::get('/', 'DashboardController@index')->name('dashboard.index');

Route::get('trainer/search', 'TrainerController@search')->name('trainer.search');
Route::get('trainer/{id}/renew', 'TrainerController@renew')->name('trainer.renew');
Route::put('trainer/renew/{id}', 'TrainerController@update_renew')->name('trainer.update.renew');

Route::get('trainer/expand/{id}', 'TrainerController@expand')->name('trainer.expand');

Route::resource('trainer', 'TrainerController');

Route::get('expired/search', 'ExpiredController@search')->name('expired.search');
Route::get('/expired', 'ExpiredController@index')->name('expired.index');

Route::get('/options', 'optionsController@index')->name('options.index');
Route::post('/options/update', 'optionsController@update')->name('options.update');
Route::get('/login', 'Auth\RegisterController@login')->name('login.index');

Route::get('/payments', 'PaymentsController@index')->name('payment.index');
Route::delete('/payments/delete/{id}', 'PaymentsController@destory')->name('payment.destroy');

Route::get('/backup', 'BackupController@backup')->name('backup');

