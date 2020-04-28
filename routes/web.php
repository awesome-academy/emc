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

Route::group(['namespace' => 'Auth'],function(){
	Route::get('/login', 'LoginController@index')->name('login');
	Route::post('/login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');
	Route::get('/register', 'RegisterController@index')->name('register');
	Route::post('/register', 'RegisterController@create');
});

Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
Route::get('/edit/user/', 'UserController@edit')->name('user.edit');
Route::post('/edit/user/', 'UserController@update')->name('user.update');
Route::get('/edit/password/user/', 'UserController@passwordEdit')->name('user.passwordEdit');
Route::post('/edit/password/user/', 'UserController@passwordUpdate')->name('user.passwordUpdate');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'CategoryController@detail')->name('category.detail');
Route::get('/product/{id}', 'ProductController@detail')->name('product.detail');
Route::post('/product/comment/{id}', 'ProductController@comment')->name('product.comment');
Route::get('/carts', 'CartController@index')->name('cart.index');
Route::get('/add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('increase/{id}', 'CartController@increaseOne')->name('cart.increase');
Route::get('reduce/{id}', 'CartController@reduceOne')->name('cart.reduce');
Route::get('remove/{id}', 'CartController@removeItem')->name('cart.remove');
Route::get('/orders', 'OrderController@index')->name('order.index');
Route::post('/orders', 'OrderController@create')->name('order.create');
Route::get('/orders/histories', 'OrderController@history')->name('order.history');
Route::get('/orders/detail/{id}', 'OrderController@detail')->name('order.detail');
Route::get('/suggest', 'SuggestController@create')->name('suggest.create');
Route::post('/suggest', 'SuggestController@store')->name('suggest.store');

Route::group(['namespace' => 'Admin', 'middleware' => 'is_admin'], function() {
    Route::get('statistical', 'Homecontroller@index')->name('admin.home.index');
    Route::get('users/', 'UserController@index')->name('admin.user.index');
    Route::get('users/lock/{id}', 'UserController@lock')->name('admin.user.lock');
    Route::get('users/active/{id}', 'UserController@active')->name('admin.user.active');
    Route::get('users/destroy/{id}', 'UserController@destroy')->name('admin.user.destroy');
});
