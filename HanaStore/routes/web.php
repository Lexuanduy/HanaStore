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
Route::get('/admin/product/create/', function () {
    return view('admin.product.form-create');
<<<<<<< HEAD
=======
});

Route::get('/admin/product/create', function () {
    return view('admin.layout.form-create');
>>>>>>> 9410030243dc16c745c1aafa1e2b27f06d988d56
});

Route::get('/admin/layout/master', function () {
    return view('admin.layout.master');
});

// test view form edit layout
Route::get('/admin/product/1/edit', function () {
    return view('admin.product.form-edit');
});
