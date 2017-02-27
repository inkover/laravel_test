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

	Route::get('/', 'Front@index');

	Auth::routes();
	// Profile Routes
	$this->get('profile', 'Auth\ProfileController@showProfileForm')->name('profile');
	$this->post('profile', 'Auth\ProfileController@updateProfile');

	// Orders
	Route::get('/order_create', [
		'middleware' => 'auth',
		'uses'       => 'Orders\CreateOrderController@createOrder'
	])->name('order_create');

	Route::post('/orders/{order_id}/add_order_item', [
		'middleware' => 'auth',
		'uses'       => 'Orders\AddOrderItemController@createItem'
	])->name('add_order_item');

	Route::post('/orders/{order_id}/recalculate', [
		'middleware' => 'auth',
		'uses'       => 'Orders\RecalcOrderController@recalcOrder'
	])->name('recalc_order');
	Route::get('/orders/{order_id}/delete', [
		'middleware' => 'auth',
		'uses'       => 'Orders\DeleteOrderController@deleteOrder'
	])->name('delete_order');
	Route::get('/orders/{order_id}/delete_item/{order_item_id}', [
		'middleware' => 'auth',
		'uses'       => 'Orders\DeleteOrderItemController@deleteItem'
	])->name('delete_order_item');

