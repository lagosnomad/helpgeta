<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'testimonials'], function()
{
    Route::get('/', 'TestimonialsApiController@index');
});
