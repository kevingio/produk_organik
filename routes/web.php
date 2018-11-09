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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('admin.home');

Route::get('/testimoni', 'HomeController@testimony')->name('testimony');

Route::get('/produk', 'ProductController@getAll')->name('show-product');

Route::get('/produk/add', 'ProductController@add')->name('add-product');

Route::get('/produk/{id}', 'HomeController@product')->name('product');

Route::post('/produk/add', 'ProductController@store')->name('submit-product');

Route::get('/produk/edit/{id}', 'ProductController@getOne')->name('edit-product');

Route::post('/produk/edit/{id}', 'ProductController@update')->name('update-product');

Route::get('/produk/delete/{id}', 'ProductController@delete')->name('delete-product');

Route::get('/testimony', 'TestimonyController@getAll')->name('show-testimony');

Route::get('/testimony/add', 'TestimonyController@add')->name('add-testimony');

Route::post('/testimony/add', 'TestimonyController@store')->name('submit-testimony');

Route::get('/testimony/edit/{id}', 'TestimonyController@getOne')->name('edit-testimony');

Route::post('/testimony/edit/{id}', 'TestimonyController@update')->name('update-testimony');

Route::get('/testimony/delete/{id}', 'TestimonyController@delete')->name('delete-testimony');

Route::get('/bcrypt', 'HomeController@generate')->name('brcrypt');

Route::get('/test', 'ProductController@test');
