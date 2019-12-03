<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'coupons'], function()
{
    Route::get('/', 'CouponsPublicController@index');
});
