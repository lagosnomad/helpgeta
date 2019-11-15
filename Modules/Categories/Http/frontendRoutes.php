<?php
use Illuminate\Support\Facades\Route;

Route::get('services', ['as' => 'categories', 'uses' => 'CategoriesPublicController@index']);
Route::get('services/category/{slug}', ['as' => 'categories.show', 'uses' => 'CategoriesPublicController@show']);
