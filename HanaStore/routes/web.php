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

// Mapping route to file with url admin/product/list
Route::get('/admin/product/list', 'ProductController@index');

Route::get('list/template', function () {
    return view('template.example-list');
});

Route::get('/form/template', function () {
    return view('template.template-form');
});
