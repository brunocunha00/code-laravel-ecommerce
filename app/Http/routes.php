<?php

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => '/admin', 'middleware'=>['auth', 'auth.admin' ]], function(){

    Route::group(['prefix' => '/categories'], function(){

        Route::get('/', ['as'=>'category_index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/create', ['as'=>'category_create', 'uses' => 'AdminCategoriesController@create']);
        Route::post('/create', ['as'=>'category_storage', 'uses' => 'AdminCategoriesController@storage']);
        Route::put('/{id}/update', ['as'=>'category_update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('/{id}/edit', ['as'=>'category_edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::get('/{id}/delete', ['as'=>'category_delete', 'uses' => 'AdminCategoriesController@delete']);

    });

    Route::group(['prefix' => '/products'], function(){

        Route::get('/', ['as'=>'product_index', 'uses' => 'AdminProductsController@index']);
        Route::get('/create', ['as'=>'product_create', 'uses' => 'AdminProductsController@create']);
        Route::post('/create', ['as'=>'product_storage', 'uses' => 'AdminProductsController@storage']);
        Route::put('/{id}/update', ['as'=>'product_update', 'uses' => 'AdminProductsController@update']);
        Route::get('/{id}/edit', ['as'=>'product_edit', 'uses' => 'AdminProductsController@edit']);
        Route::get('/{id}/delete', ['as'=>'product_delete', 'uses' => 'AdminProductsController@delete']);

        Route::group(['prefix' => '{id}/images'], function(){
            Route::get('', ['as' => 'product_image_index', 'uses' => 'AdminProductsController@indexImage']);
            Route::get('create', ['as' => 'product_image_create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('create', ['as' => 'product_image_storage', 'uses' => 'AdminProductsController@storageImage']);
            Route::get('delete', ['as' => 'product_image_delete', 'uses' => 'AdminProductsController@deleteImage']);
        });

    });
});

Route::group(['prefix' => '/cart'], function(){

    Route::get('/', ['as' => 'cart_index', 'uses' => 'CartController@index']);
    Route::get('/add/{id}', ['as' => 'cart_add', 'uses' => 'CartController@add']);
    Route::get('/destroy/{id}', ['as' => 'cart_destroy', 'uses' => 'CartController@destroy']);
    Route::get('/removeQtd/{id}', ['as' => 'cart_removeQtd', 'uses' => 'CartController@removeQtd']);
});

Route::get('/', ['as' => 'store_index', 'uses' => 'StoreController@index']);
Route::get('/category/{id}', ['as' => 'store_category', 'uses' => 'StoreController@category']);
Route::get('/product/{id}', ['as' => 'store_product', 'uses' => 'StoreController@product']);
Route::get('/tag/{id}', ['as' => 'store_tag', 'uses' => 'StoreController@tag']);

Route::get('/checkout/place', ['as' => 'checkout_place', 'uses' => 'CheckoutController@place']);

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
