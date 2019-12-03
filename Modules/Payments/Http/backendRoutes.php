<?php

use Illuminate\Support\Facades\Route;

Route::bind('payment', function ($id) {
    return app(Modules\Payments\Repositories\PaymentInterface::class)->byId($id);
});

Route::group(['prefix' => 'payments'], function () {
    Route::get('/', [
        'as' => 'admin.payments.index',
        'uses' => 'PaymentsController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.payments.create',
        'uses' => 'PaymentsController@create'
    ]);
    Route::get('{payment}/edit', [
        'as' => 'admin.payments.edit',
        'uses' => 'PaymentsController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.payments.store',
        'uses' => 'PaymentsController@store'
    ]);
    Route::put('{payment}', [
        'as' => 'admin.payments.update',
        'uses' => 'PaymentsController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.payments.datatable',
        'uses' => 'PaymentsController@dataTable'
    ]);
    Route::delete('{payment}', [
        'as' => 'admin.payments.destroy',
        'uses' => 'PaymentsController@destroy'
    ]);
});
