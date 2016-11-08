<?php

Route::group([
        'prefix' => 'admin/categories',
        'as' => 'admin.categories.',
        'namespace'=>'CodePress\CodeCategory\Controllers',
        'middleware' => ['web', 'auth']
    ],
    function(){

        Route::get('', [ 'uses' => 'AdminCategoriesController@index', 'as' => 'index']);
        Route::get('/create', [ 'uses' => 'AdminCategoriesController@create', 'as' => 'create']);
        Route::post('/store', [ 'uses' => 'AdminCategoriesController@store', 'as' => 'store']);
        Route::get('{id}/edit', [ 'uses' => 'AdminCategoriesController@edit', 'as' => 'edit']);
        Route::put('{id}/update', [ 'uses' => 'AdminCategoriesController@update', 'as' => 'update']);

    });