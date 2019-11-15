<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'checkout'], function()
{
    Route::get('/', 'CheckoutController@index')->name('checkout');
    Route::post('/session', 'CheckoutController@sessionStore')->name('checkout.session');
});
