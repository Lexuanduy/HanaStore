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

// config web by Phuocding
Route::resource('admin/product', 'ProductController');

Route::get('/list', function (){
    return view('admin.layout.list');
});

Route::resource('admin/collection', 'CollectionController');

Route::resource('admin/category', 'CategoryController');
