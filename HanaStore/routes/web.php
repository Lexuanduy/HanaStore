<?php

use App\Collection;

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
//test view form create layout

Route::get('/admin/product/search','ProductController@search');

Route::get('/admin/category/search','CategoryController@search');

Route::get('/admin/collection/search','CollectionController@search');

// config web by Phuocding
Route::resource('admin/product', 'ProductController');

//Route::get('/admin/product/action', 'ProductController@action');
// Collection - Nam
Route::resource('admin/collection', 'CollectionController');

Route::resource('admin/category', 'CategoryController');

