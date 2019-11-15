<?php

use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'artisans'], function () {
    Route::get('{category_id?}', ['as' => 'artisans', 'uses' => 'ArtisansApiController@index']);
});