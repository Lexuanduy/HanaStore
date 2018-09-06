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


//Route dashboard admin
Route::get('/admin', function (){
    return view('admin.layout.index');
});


Route::get('/admin/product/search','ProductController@search');

Route::get('/admin/category/search','CategoryController@search');

Route::get('/admin/collection/search','CollectionController@search');

// config web by Phuocding
Route::resource('admin/product', 'ProductController');


//Route update sản phẩm trong giỏ hàng.
Route::get('user/update-product-cart/{rowId}/{qty}','Usercontroller@updateProductInCart');

// Route xóa sản phẩm trong giỏ hàng
Route::delete('/user/delete-cart/{rowid}', 'Usercontroller@productDelete');

//Route Checkout giỏ hàng.
Route::post('/user/checkout-cart','UserController@checkoutCart')->name('checkoutCart');

// Admin Product
Route::delete('/admin/product/delete-all', "ProductController@destroyMany");

Route::resource('/admin/product', 'ProductController');

Route::resource('/admin/category', 'CategoryController');

Route::resource('/admin/collection', 'CollectionController');

Route::get('/error', function (){
    return view('admin.error.404');
});

// Lấy 1 san phẩm
Route::get('/admin/product/get-json/{id}', 'ProductController@getJson');


// Route User Controller Client
Route::get('/user/home', 'UserController@getIndexUser')->name('homeClient');

// Route view giỏ hàng Client
Route::get('/user/cart', 'UserController@getCart')->name('giohang');

// Route thêm vào giỏ hàng Client
Route::post('/user/add-cart/{id}', 'UserController@productBuy');

// Route view list sản phẩm Client
Route::get('/user/list-product', 'Usercontroller@listProduct')->name('listProductClient');

// Route view sản phẩm chi tiết Client
Route::get('/user/product/{id}','UserController@getProductDetail');

//View list product sale
Route::get('/user/sale', 'UserController@getIndexProductSale')->name('saleClient');

//Route view bài viết
Route::get('/user/blog', 'UserController@blog')->name('blogClient');

//Route view bài viết chi tiết.
Route::get('/user/blog/{id}','UserController@getBlogDetail');

//Route view liên hệ
Route::get('/user/contact','UserController@contact')->name('contactClient');


//View chart
Route::get('/admin/chart', function () {
   return view('admin.chart.chart');
});
Route::resource('admin/category', 'CategoryController');

/*<---=============================================================================================-->*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route login socialite Client
Route::get('auth/google', 'GoogleController@redirectToProvider');
Route::get('auth/google/callback', 'GoogleController@handleProviderCallback');

Route::get('auth/facebook', 'FacebookAuthController@redirectToProvider')->name('facebook.login');
Route::get('auth/facebook/callback', 'FacebookAuthController@handleProviderCallback');

Route::get('/chart-api', 'ChartController@getChartDataApi');

