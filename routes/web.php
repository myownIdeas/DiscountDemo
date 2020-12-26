<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/products', 'ProductController@showProducts');
Route::post('/add-to-cart', 'ProductController@addToCart');
Route::get('/show-cart', 'ProductController@showCart');
Route::get('/place-order', 'ProductController@placeOrder');
