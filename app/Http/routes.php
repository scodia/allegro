<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@getProducts');
    Route::get('/{id}', 'ProductController@getProduct');
});

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('cart', 'CartController');
    Route::resource('order', 'OrderController');
    Route::resource('user', 'UserController');
});
