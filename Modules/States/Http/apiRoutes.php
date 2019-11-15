<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'states'], function()
{
    Route::get('/', 'StatesApiController@index')->name('api.states.index');
});
