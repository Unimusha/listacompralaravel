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

Auth::routes();

Route::get('/', 'HomeController@getHome');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(["middleware" => "auth"], function () {
    Route::get('productos/{categoria?}', 'ProductoController@getIndex');
    Route::get('productos/show/{id}', 'ProductoController@getShow')->where('id', '[0-9]+');
    Route::get('productos/create', 'ProductoController@getCreate');
    Route::get('productos/edit/{id}', 'ProductoController@getEdit')->where('id', '[0-9]+');
    Route::post("productos/postCreate", "ProductoController@postCreate")->where('id', '[0-9]+');
    Route::put("productos/postEdit", 'ProductoController@putEdit')->where('id', '[0-9]+');
    Route::put("productos/comprar", "ProductoController@putComprar")->where('id', '[0-9]+');
    Route::put("productos/deletecomprado", "ProductoController@deleteComprado")->where('id', '[0-9]+');
});
