<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'banks'], function()
{
    Route::get('/', 'BanksPublicController@index');
});
