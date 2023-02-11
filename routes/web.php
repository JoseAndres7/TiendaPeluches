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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/paginacion', 'App\Http\Controllers\ProductController@paginacion')->name("product.paginacion");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/user-datos', 'App\Http\Controllers\UserController@index')->name("user.index");
Route::put('/user/{id}/update', 'App\Http\Controllers\UserController@update')->name("user.update");


Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::post('/comentario/store', 'App\Http\Controllers\ComentarioController@store')->name("comentario.store");


Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});


Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");

    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");

    Route::get('/admin/comentarios', 'App\Http\Controllers\Admin\AdminComentarioController@index')->name("admin.comentario.index");
    Route::delete('/admin/comentarios/{id}/delete', 'App\Http\Controllers\Admin\AdminComentarioController@delete')->name("admin.comentario.delete");
    Route::get('/admin/comentarios/{id}/edit', 'App\Http\Controllers\Admin\AdminComentarioController@edit')->name("admin.comentario.edit");
    Route::put('/admin/comentarios/{id}/update', 'App\Http\Controllers\Admin\AdminComentarioController@update')->name("admin.comentario.update");

    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name("admin.user.index");
    Route::delete('/admin/users/{id}/delete', 'App\Http\Controllers\Admin\AdminUserController@delete')->name("admin.user.delete");
    Route::get('/admin/users/{id}/edit', 'App\Http\Controllers\Admin\AdminUserController@edit')->name("admin.user.edit");
    Route::put('/admin/users/{id}/update', 'App\Http\Controllers\Admin\AdminUserController@update')->name("admin.user.update");

    Route::get('/admin/items', 'App\Http\Controllers\Admin\AdminItemController@index')->name("admin.item.index");
    Route::delete('/admin/items/{id}/delete', 'App\Http\Controllers\Admin\AdminItemController@delete')->name("admin.item.delete");
    Route::get('/admin/items/{id}/edit', 'App\Http\Controllers\Admin\AdminItemController@edit')->name("admin.item.edit");
    Route::put('/admin/items/{id}/update', 'App\Http\Controllers\Admin\AdminItemController@update')->name("admin.item.update");

    Route::get('/admin/orders', 'App\Http\Controllers\Admin\AdminOrderController@index')->name("admin.order.index");
    Route::delete('/admin/orders/{id}/delete', 'App\Http\Controllers\Admin\AdminOrderController@delete')->name("admin.order.delete");
    Route::get('/admin/orders/{id}/edit', 'App\Http\Controllers\Admin\AdminOrderController@edit')->name("admin.order.edit");
    Route::put('/admin/orders/{id}/update', 'App\Http\Controllers\Admin\AdminOrderController@update')->name("admin.order.update");

});

Auth::routes();
