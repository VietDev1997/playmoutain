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
Route::get('administrator', 'PageController@getAdministrator')->name('administrator');
Route::get('total_earning', 'PageController@getTotalEarning')->name('totalearning');
Route::get('satistical_information', 'PageController@getStatisticalInformation')->name('information');
Route::get('statistic_card', 'PageController@getStatisticCard')->name('statisticcard');
Route::get('sale_statistics', 'PageController@getSaleSatistic')->name('sale');
Route::get('cash_statistical', 'PageController@getCashStatistical')->name('cash');
Route::get('administrator', 'PageController@getAdministrator');
Route::get('product', 'PageController@getGoodManager')->name('product');
Route::get('stock_history', 'PageController@getInventoryHistory')->name('stockhistory');
Route::get('supplier', 'PageController@getSupplier')->name('supplier');
Route::get('maker', 'PageController@getProducer')->name('maker');
Route::get('instock', 'PageController@getImportManager')->name('instock');
Route::get('size', 'PageController@getSizeManagement')->name('size');
Route::get('color', 'PageController@getColorManagement')->name('color');
Route::get('taxes', 'PageController@getTaxAdministration')->name('taxes');
Route::get('list_of_service_packages', 'PageController@getListServicePackages');
Route::get('rental_listings', 'PageController@getRentalListings');
Route::get('shop_manager', 'PageController@getShopMannager');
Route::get('staff_management', 'PageController@getStaffManagement');
Route::get('shop-manager', 'ShopController@index')->name('shop-show-manager');
Route::get('shop-manager/create', 'ShopController@create')->name('shop-manager');
Route::post('shop-manager', 'ShopController@store');
Route::get('shop-manager/{id}/edit', 'ShopController@edit');
Route::post('shop-manager/{id}/edit', 'ShopController@update');
Route::get('shop-manager/{id}/delete', 'ShopController@destroy');
Route::post('shop-manager/{id}/delete', 'ShopController@destroy');
Route::get('shop-manager/{value}', 'ShopController@page');
Route::get('supplier', 'SuppliersController@index')->name('supplier');
Route::get('supplier/create', 'SuppliersController@create')->name('create');
Route::post('supplier/create', 'SuppliersController@AddSupplier');
Route::get('supplier/edit/{id}', 'SuppliersController@edit');
Route::post('supplier/edit/{id}', 'SuppliersController@update');
Route::post('supplier/delete/{id}', 'SuppliersController@delete');
Route::get('item-manager/producer', 'ProducerController@index');
Route::get('item-manager/producer', 'ProducerController@index')->name('producer');
Route::get('item-manager/producer/create', 'ProducerController@create');
Route::post('item-manager/producer/store', 'ProducerController@store');
Route::get('item-manager/producer/edit/{id}', 'ProducerController@edit');
Route::post('item-manager/producer/edit/{id}', 'ProducerController@update');
Route::post('item-manager/producer/{id}/delete', 'ProducerController@delete');
Route::get('color-management', 'ColorController@index')->name('color-manager');
Route::get('color-management/create', 'ColorController@create')->name('create-color-management');
Route::post('color-management', 'ColorController@addColor');
Route::get('color-management/{id}/edit', 'ColorController@edit');
Route::post('color-management/{id}/edit', 'ColorController@update');
Route::post('color-management/{id}/delete', 'ColorController@destroy');
Route::get('list-of-service-packages', 'ListServiceController@index')->name('list-of-service-packages');
Route::post('list-of-service-packages/{id}/delete', 'ListServiceController@destroy');
Route::get('list-of-service-packages/create', 'ListServiceController@create');
Route::post('list-of-service-packages', 'ListServiceController@store');
Route::get('list-of-service-packages/{id}/edit', 'ListServiceController@edit');
Route::post('list-of-service-packages/{id}/edit', 'ListServiceController@update');
Route::get('rental-listings', 'RentalController@index')->name('rental-listings');
Route::get('rental-listings/create', 'RentalController@create');
Route::post('rental-listings', 'RentalController@store');
Route::get('rental-listings/{id}/edit', 'RentalController@edit');
Route::post('rental-listings/{id}/edit', 'RentalController@update');
Route::post('rental-listings/{id}/delete', 'RentalController@destroy');
Route::get('staff', 'StaffController@index');
Route::get('size-management', 'SizeController@index')->name('size-management');
Route::get('staff', 'StaffController@index');
Route::get('size-management', 'SizeController@index')->name('size-management');
Route::get('size-management/create', 'SizeController@create')->name('create-size-management');
Route::post('size-management', 'SizeController@addSize');
Route::get('size-management/{id}/edit', 'SizeController@edit');
Route::post('size-management/{id}/edit', 'SizeController@update');
Route::post('size-management/{id}/delete', 'SizeController@destroy');
Route::post('list-of-service-packages/{id}/delete', 'ListServiceController@destroy');
Route::get('list-of-service-packages/create', 'ListServiceController@create');
Route::post('list-of-service-packages', 'ListServiceController@store');
Route::get('staff', 'StaffController@index')->name('staff');
Route::get('staff/create', 'StaffController@create');
Route::post('staff/create', 'StaffController@addStaff')->name('create_staff');
Route::get('staff/edit/{id}', 'StaffController@edit');
Route::post('staff/edit/{id}', 'StaffController@update');
Route::post('staff/delete/{id}', 'StaffController@delete');
Route::get('goods-manager', 'GoodsManagerController@index')->name('goods-manager');
Route::get('tax', 'TaxController@update')->name('tax');
Route::post('tax', 'TaxController@postTax');
Route::get('goods-manager', 'GoodsManagerController@index')->name('goods-manage');
Route::post('goods-manager/import', 'GoodsManagerController@importCsv');
Route::get('goods-manager/create', 'GoodsManagerController@create');
Route::post('goods-manager/create', 'GoodsManagerController@storeProduct');
Route::get('goods-manager/add', 'GoodsManagerController@create');
Route::post('goods-manager/add', 'GoodsManagerController@storeProduct');
Route::get('goods-manager/{id}/copy', 'GoodsManagerController@edit');
Route::get('search', 'GoodsManagerController@search')->name('search');
Route::post('goods-manager/{stock_count}/{product_id}', 'GoodsManagerController@update');
Route::post('goods-manager/create/{product_id}/{shop_id}/{number}/{id}', 'GoodsManagerController@store');
Route::any('goods-manager/move/{product_id}/{shop}/{number}/{id}/{shop_id}/{from_number}', 'GoodsManagerController@move');
Route::get('api/zipcode/{zipcode}', 'SuppliersController@getDataZipcode');
Route::get('api/postcode/{postcode}', 'StaffController@getDataZipcode');
Route::post('goods-manager/add', 'MultiStockController@multiAdd');
Route::post('goods-manager/move', 'MultiStockController@multiMove');
Route::get('login','AdminController@index');