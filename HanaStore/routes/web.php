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
// //test view form create layout
Route::get('/admin/product/create', function () {
    return view('admin.layout.form-create');
});

Route::get('/admin/layout/master', function () {
    return view('admin.layout.master');
});
