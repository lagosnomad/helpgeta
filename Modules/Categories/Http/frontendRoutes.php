<?php
use Illuminate\Support\Facades\Route;

Route::get('services', ['as' => 'categories', 'uses' => 'CategoriesPublicController@index']);
Route::get('services/{uri}', ['as' => 'categories.show', 'uses' => 'CategoriesPublicController@show'])->where('uri', '(.*)');
