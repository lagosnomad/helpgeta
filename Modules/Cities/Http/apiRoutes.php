<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cities'], function()
{
    Route::get('/{state_id}', 'CitiesApiController@index')->name('api.cities.index');
});
