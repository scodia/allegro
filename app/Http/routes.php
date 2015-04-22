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
    Route::get('/products/{search?}', 'ProductController@getProducts');
    Route::get('/product/{id}', 'ProductController@getProduct');
    
    Route::get('/categories', 'CategoryController@getCategories');
    Route::get('/category/{id}', 'CategoryController@getCategory');
    
    Route::get('/basket', 'APIController@getBasket');
    Route::post('/basket/{id}', 'APIController@addItemToBasket');
    Route::put('/basket/{id}', 'APIController@updateBasketItem');
    Route::delete('/basket/{id}', 'APIController@removeBasketItem');

    Route::post('/payment', 'APIController@payment');
    Route::post('/login', 'APIController@login');
});

