<?php

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => '/admin'], function(){

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

    });
});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
