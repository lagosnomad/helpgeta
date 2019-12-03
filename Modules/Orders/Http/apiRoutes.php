<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'orders'], function () {
    Route::get('/', ['as' => 'api.orders.index', 'uses' => 'OrdersApiController@index']);
    Route::post('store', ['as' => 'api.orders.store', 'uses' => 'OrdersApiController@store']);
    Route::post('{order_number}/update-status', ['as' => 'api.orders.status.update', 'uses' => 'OrdersApiController@updateStatus']);
    Route::post('{order_number}/update-payment', ['as' => 'api.orders.payment.update', 'uses' => 'OrdersApiController@updatePayment']);
});
