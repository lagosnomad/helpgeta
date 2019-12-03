<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'categories'], function()
{
    Route::get('/', 'CategoriesApiController@index')->name('api.categories.index');
    Route::get('/nested/{category_id}', 'CategoriesApiController@nested')->name('api.categories.nested');
    Route::get('/search', 'CategoriesApiController@search')->name('api.categories.search');
});
