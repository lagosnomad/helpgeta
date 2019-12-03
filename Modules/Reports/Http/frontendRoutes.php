<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'reports'], function()
{
    Route::get('/', 'ReportsPublicController@index');
});
