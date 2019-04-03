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
    return view('index');
});
Route::get('bahanbaku', 'productController@index')->name('showallbb');
Route::post('getdetails_bb', 'productController@getdetails')->name('getdetails_bb');
Route::post('update_bb', 'productController@update')->name('updatebb');
Route::post('/delete_bb/', 'productController@delete')->name('delete_bb');
Route::get('showaddbahanbaku', 'productController@showaddbahanbaku')->name('inputbb');
Route::post('storebahanbaku', 'productController@storebahanbaku')->name('storebahanbaku');
Route::get('inputstokbahanbaku', 'productController@showinputstokbahanbaku')->name('inputstokbb');
Route::post('storestokbahanbaku', 'productController@storestokbahanbaku')->name('storestokbahanbaku');

Route::get('supplier', 'supplierController@index')->name('showallsupplier');
Route::get('inputsupplier', 'supplierController@showinput')->name('showaddsupplier');
Route::post('storesupplier', 'supplierController@storesupplier')->name('storesupplier');
Route::post('getdetails_supplier', 'supplierController@getdetails')->name('getdetails_supplier');
Route::post('update_supplier', 'supplierController@update')->name('updatesupplier');
Route::post('/delete_supplier/', 'supplierController@delete')->name('delete_supplier');

Route::get('customer', 'customerController@index')->name('showallcustomer');
Route::get('inputcustomer', 'customerController@showinput')->name('showaddcustomer');
Route::post('storecustomer', 'customerController@storecustomer')->name('storecustomer');
Route::post('getdetails_customer', 'customerController@getdetails')->name('getdetails_customer');
Route::post('update_customer', 'customerController@update')->name('updatecustomer');
Route::post('/delete_customer/', 'customerController@delete')->name('delete_customer');

Route::get('karyawan', 'karyawanController@index')->name('showallkaryawan');
Route::get('inputkaryawan', 'karyawanController@showinput')->name('showaddkaryawan');
Route::post('getdetails_karyawan', 'karyawanController@getdetails')->name('getdetails_karyawan');
Route::post('storekaryawan', 'karyawanController@storekaryawan')->name('storekaryawan');
Route::post('update', 'karyawanController@update')->name('updatekaryawan');
Route::post('/delete_karyawan/', 'karyawanController@delete')->name('delete_karyawan');

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

Route::post('/delete_mesin/', 'MesinController@delete')->name('delete_mesin');
Route::post('update_mesin', 'MesinController@update')->name('updatemesin');
Route::post('getdetails_mesin', 'MesinController@getdetails')->name('getdetails_mesin');


//mesin

// Route::get('inputmesin', 'mesinController@create')->name('inputmesin');
// Route::post('storemesin', 'mesinController@store')->name('storemesin');
// Route::get('editmesin', 'mesinController@edit')->name('editmesin');
// Route::post('updatemesin', 'mesinController@update')->name('updatemesin');
// Route::get('hapusmesin/{id}', 'mesinController@destroy')->name('hapusmesin');
