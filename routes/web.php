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

Route::get('/', 'HomeController@index');
Route::get('collections', 'ProductController@index');
Route::get('collections/order', 'OrderFormController@index');
Route::get('about', 'AboutController@index');
Route::get('payment-status', 'InvoiceSearchController@index');


/*--------------- Admin side ---------------*/
Route::get('admin/stat', function()) {
	return view('admin-side/stat');
}

Route::get('admin/product', function()) {
	return view('admin-side/product');
}

Route::get('admin/transaction', function()) {
	return view('admin-side/transaction');
}

Route::get('admin/adminRole', function()) {
	return view('admin-side/adminRole');
}