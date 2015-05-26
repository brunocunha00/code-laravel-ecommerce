<?php

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => '/admin'], function(){

    Route::group(['prefix' => '/categories'], function(){

        Route::get('/', ['as'=>'category_index', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/new', ['as'=>'category_new', 'uses' => 'AdminCategoriesController@new']);
        Route::get('/update/{category}', ['as'=>'category_update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('/delete/{id}', ['as'=>'category_delete', 'uses' => 'AdminCategoriesController@delete']);

    });

    Route::group(['prefix' => '/products'], function(){

        Route::get('/', ['as'=>'product_index', 'uses' => 'AdminProductsController@index']);
        Route::get('/new', ['as'=>'product_new', 'uses' => 'AdminProductsController@new']);
        Route::get('/update/{product}', ['as'=>'product_update', 'uses' => 'AdminProductsController@update']);
        Route::get('/delete/{id}', ['as'=>'product_delete', 'uses' => 'AdminProductsController@delete']);

    });
});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
