<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cities'], function()
{
    Route::get('/', 'CitiesApiController@index');
});
