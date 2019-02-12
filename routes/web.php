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

Route::get('/', 'HomeController@index')->name('home');
Route::get('collections', 'ProductController@index')->name('collections');
Route::get('collections/order', 'OrderFormController@index')->name('collections.order');
Route::get('about', 'AboutController@index')->name('about');
Route::get('payment-status', 'InvoiceSearchController@index')->name('payment-status');


/*--------------- Admin side ---------------*/
Route::get('admin', 'LoginController@index')->middleware('guest')->name('login');
Route::post('admin', 'LoginController@loginAttempt')->middleware('guest')->name('login');

Route::group(['middleware' => ['admin']], function () {
	Route::get('admin/stat', function() {
		return view('admin-side/stat');
	});

	Route::get('admin/product', function() {
		return view('admin-side/adminProduct');
	});

	Route::get('admin/transaction', 'TransactionController@index')->name('transaction');
	Route::get('admin/transaction/detail/{id}', 'TransactionController@detail')->name('transaction.detail');
	Route::get('admin/transaction/detail/{id}/edit', 'TransactionController@editStatus')->name('transaction.detail.edit');
	Route::put('admin/transaction/detail/{id}', 'TransactionController@updateStatus')->name('transaction.detail');
	Route::get('admin/transaction/download-excel', 'TransactionController@downloadExcel')->name('transaction.download.excel');

	Route::get('admin/admin-role', 'AdminRoleController@index')->name('admin-role');
	Route::get('admin/admin-role/register', 'AdminRoleController@registerNewAdmin')->name('admin-role.register');
	Route::post('admin/admin-role/register', 'AdminRoleController@emailCheck')->name('admin-role.register');
	Route::post('admin/admin-role', 'AdminRoleController@submitRegister')->name('admin-role');

	Route::get('admin-logout', 'LoginController@logout')->name('logout');
});