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
//     return view('welcome');
// });

Route::group(['middleware' => ['user.tracker']], function () {
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('collections', 'ProductController@index')->name('collections');
	Route::get('collections/order', 'OrderFormController@index')->name('collections.order');
	Route::get('about', 'AboutController@index')->name('about');
	Route::get('payment-status', 'InvoiceSearchController@index')->name('payment-status');
	Route::post('payment-status', 'InvoiceSearchController@doSearch')->name('payment-status.search');
});

/*--------------- Admin side ---------------*/
Route::get('admin', 'LoginController@index')->middleware('guest')->name('login');
Route::post('admin', 'LoginController@loginAttempt')->middleware('guest')->name('login');

Route::group(['middleware' => ['admin']], function () {
	Route::get('admin/stat', 'StatisticsController@index')->name('stat');

	/*---------- Admin Product ----------*/
	Route::post('admin/product', 'AdminProductController@store');

	Route::get('admin/product', 'AdminProductController@index' )->name('collectionsPerYear');

	Route::get('admin/product/{id}', 'AdminProductController@show' )->name('product-mgt');

	Route::resource('admin/image', 'ImageController');
	// Route::post('admin/product/{id}', 'AdminProductController@store' )->name('add-product');

	/*---------- Transaction ----------*/
	Route::get('admin/transaction', 'TransactionController@index')->name('transaction');

	Route::get('admin/transaction/detail/{id}', 'TransactionController@detail')->name('transaction.detail');

	Route::get('admin/transaction/detail/{id}/edit', 'TransactionController@editStatus')->name('transaction.detail.edit');

	Route::put('admin/transaction/detail/{id}', 'TransactionController@updateStatus')->name('transaction.detail');

	Route::get('admin/transaction/download-excel', 'TransactionController@downloadExcel')->name('transaction.download.excel');


	/*---------- Admin Role ----------*/
	Route::get('admin/admin-role', 'AdminRoleController@index')->name('admin-role');

	Route::get('admin/admin-role/register', 'AdminRoleController@registerNewAdmin')->name('admin-role.register');

	Route::post('admin/admin-role/register', 'AdminRoleController@emailCheck')->name('admin-role.register');

	Route::post('admin/admin-role', 'AdminRoleController@submitRegister')->name('admin-role');

	Route::post('admin/admin-role/delete', 'AdminRoleController@deleteAdmin')->middleware('admin.root')->name('admin-role.delete');

	Route::get('admin/change-password', 'AdminRoleController@changePassword')->name('change-password');
	Route::put('admin/submit-change-password', 'AdminRoleController@submitChangePassword')->name('change-password.submit');

	Route::get('admin/admin-logout', 'LoginController@logout')->name('logout');
});