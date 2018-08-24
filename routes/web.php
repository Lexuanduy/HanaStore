<?php

use Illuminate\Support\Facades\Auth;
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

// Admin Product
Route::delete('/admin/product/delete-all', "ProductController@destroyMany");
Route::resource('/admin/product', 'ProductController');


Route::get('/', function (){
    return view('welcome');
});


// Lấy 1 san phẩm
Route::get('/admin/product/get-json/{id}', 'ProductController@getJson');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// User Controller
Route::get('/user/home', 'UserController@getIndexUser');

// Route view giỏ hàng
Route::get('/user/cart', 'UserController@getCart')->name('giohang');

// Route thêm vào giỏ hàng
Route::get('/user/add-cart/{id}', 'UserController@productBuy');

// Route view list sản phẩm
Route::get('/user/list', 'Usercontroller@listProduct');



