<?php

use Illuminate\Support\Facades\Route;

Route::bind('identification', function ($id) {
    return app(Modules\Identifications\Repositories\IdentificationInterface::class)->byId($id);
});

Route::group(['prefix' => 'identifications'], function () {
    Route::get('/', [
        'as' => 'admin.identifications.index',
        'uses' => 'IdentificationsController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.identifications.create',
        'uses' => 'IdentificationsController@create'
    ]);
    Route::get('{identification}/edit', [
        'as' => 'admin.identifications.edit',
        'uses' => 'IdentificationsController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.identifications.store',
        'uses' => 'IdentificationsController@store'
    ]);
    Route::put('{identification}', [
        'as' => 'admin.identifications.update',
        'uses' => 'IdentificationsController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.identifications.datatable',
        'uses' => 'IdentificationsController@dataTable'
    ]);
    Route::delete('{identification}', [
        'as' => 'admin.identifications.destroy',
        'uses' => 'IdentificationsController@destroy'
    ]);
});
