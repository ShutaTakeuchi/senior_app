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
    // 結果
    Route::get('/delivery/result', 'DeliveryController@show')->name('delivery.show');
    // 確認
    Route::get('/delivery/conf', 'DeliveryController@confirm_purchase')->name('delivery.conf');
    // 完了
    Route::get('/delivery/sheet', 'DeliveryController@insert_data_sheet')->name('delivery.sheet');

    // 日用品通販
    // 検索
    Route::get('/item', 'ItemController@index')->name('item.index');
    // 結果
    Route::get('/item/show', 'ItemController@guzzle')->name('item.show');
    // 確認
    Route::get('/item/conf', 'ItemController@confirm_purchase')->name('item.conf');
    // 完了
    Route::get('/item/sheet', 'ItemController@insert_data_sheet')->name('item.sheet');

    // 健康状態管理
    // 入力フォーム
    Route::get('/health', 'HealthController@index')->name('health.index');

    // 天気予報
    Route::get('/weather', 'HomeController@get_weather')->name('weather.index');

    // 連絡
    // 一覧
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    // 緊急
    Route::get('/contact/emergency', 'ContactController@emergency')->name('contact.emergency');
    // タクシー
    Route::get('/contact/taxt', 'ContactController@taxi')->name('contact.texi');
 });