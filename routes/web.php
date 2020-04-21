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
Route::get('/carts', 'CartController@index')->name('cart.index');
Route::get('/add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('increase/{id}', 'CartController@increaseOne')->name('cart.increase');
Route::get('reduce/{id}', 'CartController@reduceOne')->name('cart.reduce');
Route::get('remove/{id}', 'CartController@removeItem')->name('cart.remove');
