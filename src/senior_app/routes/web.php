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

// Route::get('/', function () {
//     return view('');
// });

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    // トップページ
    Route::get('/', 'HomeController@index')->name('home');

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


    // 各種連絡
    // 一覧
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    // 緊急
    Route::get('/contact/emergency', 'ContactController@emergency')->name('contact.emergency');
    // タクシー手配確認
    Route::get('/contact/conf/taxi', 'ContactController@conf_taxi')->name('contact.conf.taxi');
    // 注文キャンセル
    // 注文中一覧
    Route::get('/contact/show', 'ContactController@show_order')->name('contact.show.order');
    // キャンセルの確認
    Route::get('/contact/conf/cancel', 'ContactController@conf_cancel')->name('contact.conf.cancel');
    // キャンセル申請の完了
    Route::post('/contact/comp/cancel', 'ContactController@comp_cancel')->name('contact.comp.cancel');
    // 予約完了
    Route::get('/contact/comp/taxi', 'ContactController@comp_taxi')->name('contact.comp.taxi');
    // 個人情報変更申請完了
    Route::get('/contact/conf/edit', 'ContactController@conf_edit_user_info')->name('contact.conf.edit');
    // 個人情報変更申請完了
    Route::get('/contact/comp/edit', 'ContactController@comp_edit_user_info')->name('contact.comp.edit');

    // 天気予報API
    Route::get('/weather', 'HomeController@get_weather')->name('weather.index');


    // 健康状態管理
    // 入力フォーム
    // Route::get('/health', 'HealthController@index')->name('health.index');
    // Route::post('/health/submit', 'HealthController@insert')->name('health.insert');

    // 投稿
    Route::post('/post', 'PostController@post')->name('post');

    // 個人情報
    Route::get('/user/index', 'UserController@index')->name('user.index');
});

// admin認証のルーティング
/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('/',         function () {
        return redirect('/admin/home');
    });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
    // delivery
    // 検索
    Route::get('delivery/search', 'Admin\DeliveryController@search')->name('admin.search.delivery');
    // 担当者入力画面
    Route::get('delivery/insert/staff', 'Admin\DeliveryController@insert_staff')->name('admin.staff.delivery');
    // 担当者保存
    Route::post('delivery/store/staff', 'Admin\DeliveryController@store_staff')->name('admin.store_staff.delivery');

    // // 一覧
    Route::get('delivery/show_all', 'Admin\DeliveryController@show_all')->name('admin.delivery.show_all');
    // 検索結果
    Route::post('delivery/show', 'Admin\DeliveryController@show')->name('admin.delivery.show');
    // 配達済み
    Route::post('delivery/delete', 'Admin\DeliveryController@delete')->name('admin.delivery.delete');

    // item
    // 検索
    Route::get('item/search', 'Admin\ItemController@search')->name('admin.search.item');
    // // 一覧
    Route::get('item/show_all', 'Admin\ItemController@show_all')->name('admin.item.show_all');
    // 検索結果
    Route::post('item/show', 'Admin\ItemController@show')->name('admin.item.show');
    // 配達済み
    Route::post('item/delete', 'Admin\ItemController@delete')->name('admin.item.delete');

    // person
    // お客様一覧
    Route::get('person/index', 'Admin\PersonController@show_people')->name('admin.person.show');
    // お客様検索結果
    Route::post('person/search', 'Admin\PersonController@get_person')->name('admin.person.search');
    // お客様検索結果
    Route::post('person/edit', 'Admin\PersonController@edit')->name('admin.person.edit');
    // お客様検索結果
    Route::post('person/update', 'Admin\PersonController@update')->name('admin.person.update');
    // アカウント削除の確認画面
    Route::post('person/delete/conf', 'Admin\PersonController@conf_delete')->name('admin.person.conf_del');
    // アカウント削除完了
    Route::post('person/delete/comp', 'Admin\PersonController@delete')->name('admin.person.delete');
});



// 訪問型会員登録
Route::get('visit/form', function () {
    return view('visit/form');
});



// NoLogin
Route::get('welcome/', 'WelcomeController@index')->name('welcome.index');
// 営業所の住所
Route::get('welcome/address', 'WelcomeController@address')->name('welcome.address');
// 訪問型の会員登録のフォーム
Route::get('welcome/visit/form', 'WelcomeController@form')->name('welcome.form');
// 訪問型の会員登録の確認画面
Route::post('welcome/visit/form/conf', 'WelcomeController@conf')->name('welcome.form.conf');
// 訪問型の会員登録の確認画面
Route::post('welcome/visit/form/comp', 'WelcomeController@comp')->name('welcome.form.comp');