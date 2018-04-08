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

Route::post('/cart', 'HomeController@addItemToCart')->name('cart');
Route::get('/cart', 'HomeController@showCart')->name('showCart');
Route::get('/cart-remove/{id}', 'HomeController@cartRemove')->name('showCart');
Route::get('/confirm-order', 'HomeController@confirmOrder')->name('confirmOrder');