<?php

use Illuminate\Support\Facades\Route;

Route::bind('category', function ($id) {
    return app(\Modules\Categories\Repositories\CategoryInterface::class)->byId($id);
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [
        'as' => 'admin.categories.index',
        'uses' => 'CategoriesController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.categories.create',
        'uses' => 'CategoriesController@create'
    ]);
    Route::get('{category}/edit', [
        'as' => 'admin.categories.edit',
        'uses' => 'CategoriesController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.categories.store',
        'uses' => 'CategoriesController@store'
    ]);
    Route::put('admin/categories/{category}', [
        'as' => 'admin.categories.update',
        'uses' => 'CategoriesController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.categories.datatable',
        'uses' => 'CategoriesController@dataTable'
    ]);
    Route::delete('admin/categories/{category}', [
        'as' => 'admin.categories.destroy',
        'uses' => 'CategoriesController@destroy'
    ]);
});
