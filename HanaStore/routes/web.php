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
//test view form create layout

// config web by Phuocding
Route::resource('/admin/product', 'ProductController');

// modified routing in view master
Route::get('/admin/', function () {
    return view('admin.layout.master');
});

// don't need to show this url
Route::get('/admin/layout/master', function () {
    return view('admin.layout.master');
});

//view show product
Route::get('/admin/product/show/{id}', 'ProductController@show');

// test view form edit layout
Route::get('/admin/product/1/edit', function () {
    return view('admin.product.form-edit');
});

Route::get('/admin/product/show/{id}', 'ProductController@show');
