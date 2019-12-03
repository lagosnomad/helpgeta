<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'payments'], function()
{
    Route::get('/', 'PaymentsPublicController@index');
});
