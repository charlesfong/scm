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
// Route::get('product', 'productController@index')->name('/');
// Route::get('login', 'productController@showaddbahanbaku')->name('inputbb');
Route::get('showaddbahanbaku', 'productController@showaddbahanbaku')->name('inputbb');
Route::post('storebahanbaku', 'productController@storebahanbaku')->name('storebahanbaku');
Route::get('inputstokbahanbaku', 'productController@showinputstokbahanbaku')->name('inputstokbb');
Route::post('storestokbahanbaku', 'productController@storestokbahanbaku')->name('storestokbahanbaku');
Route::get('supplier', 'supplierController@index')->name('supplier');
Route::get('customer', 'customerController@index')->name('showallcustomer');
Route::get('inputcustomer', 'customerController@showinput')->name('showaddcustomer');
Route::post('storecustomer', 'customerController@storecustomer')->name('storecustomer');

Route::get('karyawan', 'karyawanController@index')->name('showallkaryawan');
Route::get('inputkaryawan', 'karyawanController@showinput')->name('showaddkaryawan');
Route::post('getdetails_karyawan', 'karyawanController@getdetails')->name('getdetails_karyawan');
Route::post('storekaryawan', 'karyawanController@storekaryawan')->name('storekaryawan');
Route::post('update_karyawan', 'karyawanController@update')->name('updatekaryawan');
Route::post('/delete/', 'karyawanController@delete')->name('delete_karyawan');

Route::get('order', 'orderController@orderlist')->name('showallorder');
Route::get('inputorder', 'orderController@showinput')->name('showaddorder');
Route::post('storeorder', 'orderController@storeorder')->name('storeorder');
Route::post('getdetails_order', 'orderController@getdetails')->name('getdetails_order');

Route::get('spk', 'spkController@index')->name('showallspk');
Route::get('inputspk', 'spkController@showinput')->name('showaddspk');
Route::post('storespk', 'spkController@storespk')->name('storespk');

Route::get('barangjadi', 'barangjadiController@index')->name('showallbarangjadi');
Route::get('inputbarangjadi', 'barangjadiController@showinput')->name('showaddbarangjadi');
Route::post('storebarangjadi', 'barangjadiController@storebarangjadi')->name('storebarangjadi');

Route::get('mesin', 'MesinController@index')->name('showallmesin');
Route::get('inputmesin', 'MesinController@showinput')->name('showaddmesin');
Route::post('storemesin', 'MesinController@storemesin')->name('storemesin');
Route::post('/delete/', 'MesinController@delete')->name('delete_mesin');