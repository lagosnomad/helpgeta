<?php

use Illuminate\Support\Facades\Route;

/** @var Route $router */
Route::bind('order', function ($id) {
    return app(\Modules\Orders\Repositories\OrderInterface::class)->byId($id);
});

Route::group(['prefix' => 'orders'], function () {
    Route::get('/', [
        'as' => 'admin.orders.index',
        'uses' => 'OrdersController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.orders.create',
        'uses' => 'OrdersController@create'
    ]);
    Route::get('{category}/edit', [
        'as' => 'admin.orders.edit',
        'uses' => 'OrdersController@edit'
    ]);
    Route::get('datatable/{artisan_user_id?}', [
        'as' => 'admin.orders.datatable',
        'uses' => 'OrdersController@dataTable'
    ]);
    Route::get('{order}', [
        'as' => 'admin.orders.show',
        'uses' => 'OrdersController@show'
    ]);
    Route::post('/', [
        'as' => 'admin.orders.store',
        'uses' => 'OrdersController@store'
    ]);
    Route::put('admin/orders/{category}', [
        'as' => 'admin.orders.update',
        'uses' => 'OrdersController@update'
    ]);
    Route::delete('admin/orders/{order}', [
        'as' => 'admin.orders.destroy',
        'uses' => 'OrdersController@destroy'
    ]);
});
