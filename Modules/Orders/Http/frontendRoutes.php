<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'account/requests'], function () {
    Route::get('/', [
        'as' => 'account.orders.index',
        'uses' => 'OrdersAccountController@index'
    ]);
    Route::get('/{order_number}', [
        'as' => 'account.orders.show',
        'uses' => 'OrdersAccountController@show'
    ]);
});