<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('order', 'OrderController');
    Route::resource('user', 'UserController');
    Route::resource('login', 'LoginController');
});

Route::group(['prefix' => 'api', 'namespace' => 'API', 'middleware' => 'auth'], function () {
    Route::resource('cart', 'CartController');
});

Route::group(['namespace' => 'View'], function () {
    Route::resource('products', 'ProductController');
});