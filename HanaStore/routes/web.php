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

//Route update sản phẩm trong giỏ hàng.
Route::get('user/update-product-cart/{rowId}/{qty}','Usercontroller@updateProductInCart');

// Route xóa sản phẩm trong giỏ hàng
Route::delete('/user/delete-cart/{rowid}', 'Usercontroller@productDelete');

//test view form create layout

// config web by Phuocding
Route::resource('admin/product', 'ProductController');

// Collection - Nam
Route::resource('admin/collection', 'CollectionController');

Route::resource('admin/category', 'CategoryController');

// User Controller
Route::get('/user/home', 'UserController@getIndexUser');

// Route view giỏ hàng
Route::get('/user/cart', 'UserController@getCart')->name('giohang');

// Route thêm vào giỏ hàng
Route::get('/user/add-cart/{id}', 'UserController@productBuy');

// Route view list sản phẩm
Route::get('/user/list', 'Usercontroller@listProduct');

