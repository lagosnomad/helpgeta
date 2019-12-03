<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'identifications'], function()
{
    Route::get('/', 'IdentificationsApiController@index');
});
