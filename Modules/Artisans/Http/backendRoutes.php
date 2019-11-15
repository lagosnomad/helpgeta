<?php

use Illuminate\Support\Facades\Route;

Route::bind('artisan', function ($id) {
    return app(\Modules\Artisans\Repositories\ArtisanInterface::class)->byId($id);
});

Route::group(['prefix' => 'artisans'], function () {
    Route::get('/', [
        'as' => 'admin.artisans.index',
        'uses' => 'ArtisansController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.artisans.create',
        'uses' => 'ArtisansController@create'
    ]);
    Route::get('{artisan}/edit', [
        'as' => 'admin.artisans.edit',
        'uses' => 'ArtisansController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.artisans.store',
        'uses' => 'ArtisansController@store'
    ]);
    Route::put('admin/artisans/{artisan}', [
        'as' => 'admin.artisans.update',
        'uses' => 'ArtisansController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.artisans.datatable',
        'uses' => 'ArtisansController@dataTable'
    ]);
    Route::delete('admin/artisans/{artisan}', [
        'as' => 'admin.artisans.destroy',
        'uses' => 'ArtisansController@destroy'
    ]);
});
