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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    // 配色サービス
    // 検索
    Route::get('/delivery', 'DeliveryController@index')->name('delivery.index');
    // 検索結果
    Route::get('/delivery/result', 'DeliveryController@show')->name('delivery.show');
 });