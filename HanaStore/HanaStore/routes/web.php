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

Route::get('/list/template', function (){
    return view('template.list-form');
});

Route::get('admin/product', function (){
    return view('admin.flower.list');
});

// mapping route to file with url form/template
Route::get('/form/template', function () {
    return view('template.example-form');
});
