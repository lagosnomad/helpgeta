<?php
use Illuminate\Support\Facades\Route;

Route::get('service-provider/{slug}', ['as' => 'artisans.show', 'uses' => 'ArtisansPublicController@show']);
