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

// routes customers
Route::get('/', function(){return view('home');})->name('home');
Auth::routes();
Route::group(['middleware' => 'auth'], function(){ //route group users
	Route::get('/kredit', function(){return view('kredit.create');})->name('kredit.create');
	Route::post('/kredit', 'KreditController@insert')->name('kredit.insert');
});
	
// routes admins
Route::group(['prefix' => 'admin'], function(){	
	Route::group(['middleware' => 'guest:admin'], function(){
		Route::get('/login', function(){ return view('admin.login');})->name('admin.login');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
		Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	});

	Route::group(['middleware' => 'auth:admin'], function(){
		Route::get('/dashboard', 'AdminController@index')->name('dashboard');
		Route::get('/customers', 'CustomersController@index')->name('customers.index');
		Route::get('/get customer', 'CustomersController@insert')->name('customers.insert');
		Route::get('/credits', 'CreditController@index')->name('credit.index');
		Route::post('/credits', 'CreditController@approve')->name('credit.approve');
		Route::delete('/credits', 'CreditController@delete')->name('credit.delete');
	});
});