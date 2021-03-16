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
    // 配食サービス
    // 検索
    Route::get('/delivery', 'DeliveryController@index')->name('delivery.index');
    // 検索結果
    Route::get('/delivery/result', 'DeliveryController@show')->name('delivery.show');

    // 健康状態管理
    // 入力フォーム
    Route::get('/health', 'HealthController@index')->name('health.index');

    // 天気予報
    Route::get('/weather', 'HomeController@get_weather')->name('weather.index');

    // 日用品通販
    Route::get('/item', 'ItemController@index')->name('item.index');
    // Route::get('/item/result', 'ItemController@show')->name('item.show');
    Route::get('/item/show', 'ItemController@guzzle')->name('item.show');
 });