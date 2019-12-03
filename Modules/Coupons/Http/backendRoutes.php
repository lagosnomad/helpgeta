<?php

use Illuminate\Support\Facades\Route;

Route::bind('coupon', function ($id) {
    return app(Modules\Coupons\Repositories\CouponInterface::class)->byId($id);
});

Route::group(['prefix' => 'coupons'], function () {
    Route::get('/', [
        'as' => 'admin.coupons.index',
        'uses' => 'CouponsController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.coupons.create',
        'uses' => 'CouponsController@create'
    ]);
    Route::get('{coupon}/edit', [
        'as' => 'admin.coupons.edit',
        'uses' => 'CouponsController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.coupons.store',
        'uses' => 'CouponsController@store'
    ]);
    Route::put('{coupon}', [
        'as' => 'admin.coupons.update',
        'uses' => 'CouponsController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.coupons.datatable',
        'uses' => 'CouponsController@dataTable'
    ]);
    Route::delete('{coupon}', [
        'as' => 'admin.coupons.destroy',
        'uses' => 'CouponsController@destroy'
    ]);
});
