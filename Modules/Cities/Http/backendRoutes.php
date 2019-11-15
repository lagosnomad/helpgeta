<?php

use Illuminate\Support\Facades\Route;

Route::bind('$SINGULAR_LOWER_NAME$', function ($id) {
    return app(Modules\Cities\Repositories\CityInterface::class)->byId($id);
});

Route::group(['prefix' => 'cities'], function () {
    Route::get('/', [
        'as' => 'admin.cities.index',
        'uses' => 'CitiesController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.cities.create',
        'uses' => 'CitiesController@create'
    ]);
    Route::get('{$SINGULAR_LOWER_NAME$}/edit', [
        'as' => 'admin.cities.edit',
        'uses' => 'CitiesController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.cities.store',
        'uses' => 'CitiesController@store'
    ]);
    Route::put('{$SINGULAR_LOWER_NAME$}', [
        'as' => 'admin.cities.update',
        'uses' => 'CitiesController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.cities.datatable',
        'uses' => 'CitiesController@dataTable'
    ]);
    Route::delete('{$SINGULAR_LOWER_NAME$}', [
        'as' => 'admin.cities.destroy',
        'uses' => 'CitiesController@destroy'
    ]);
});
