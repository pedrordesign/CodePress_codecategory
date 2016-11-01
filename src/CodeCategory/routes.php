<?php

Route::group([
        'prefix' => 'admin/categories',
        'as' => 'admin.categories.',
        'namespace'=>'CodePress\CodeCategory\Controllers',
        'middleware' => ['web']
    ],
    function(){

    Route::get('', [ 'uses' => 'AdminCategoriesController@index', 'as' => 'index']);
    Route::get('/create', [ 'uses' => 'AdminCategoriesController@create', 'as' => 'create']);
    Route::post('/store', [ 'uses' => 'AdminCategoriesController@store', 'as' => 'store']);

});