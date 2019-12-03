<?php

use Illuminate\Support\Facades\Route;

Route::bind('city', function ($id) {
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
    Route::get('{city}/edit', [
        'as' => 'admin.cities.edit',
        'uses' => 'CitiesController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.cities.store',
        'uses' => 'CitiesController@store'
    ]);
    Route::put('{city}', [
        'as' => 'admin.cities.update',
        'uses' => 'CitiesController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.cities.datatable',
        'uses' => 'CitiesController@dataTable'
    ]);
    Route::delete('{city}', [
        'as' => 'admin.cities.destroy',
        'uses' => 'CitiesController@destroy'
    ]);
});
