<?php

use Illuminate\Support\Facades\Route;

Route::bind('bank', function ($id) {
    return app(Modules\Banks\Repositories\BankInterface::class)->byId($id);
});

Route::group(['prefix' => 'banks'], function () {
    Route::get('/', [
        'as' => 'admin.banks.index',
        'uses' => 'BanksController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.banks.create',
        'uses' => 'BanksController@create'
    ]);
    Route::get('{bank}/edit', [
        'as' => 'admin.banks.edit',
        'uses' => 'BanksController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.banks.store',
        'uses' => 'BanksController@store'
    ]);
    Route::put('{bank}', [
        'as' => 'admin.banks.update',
        'uses' => 'BanksController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.banks.datatable',
        'uses' => 'BanksController@dataTable'
    ]);
    Route::delete('{bank}', [
        'as' => 'admin.banks.destroy',
        'uses' => 'BanksController@destroy'
    ]);
});
