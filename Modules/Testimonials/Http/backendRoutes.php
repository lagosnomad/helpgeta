<?php

use Illuminate\Support\Facades\Route;

Route::bind('testimonial', function ($id) {
    return app(Modules\Testimonials\Repositories\TestimonialInterface::class)->byId($id);
});

Route::group(['prefix' => 'testimonials'], function () {
    Route::get('/', [
        'as' => 'admin.testimonials.index',
        'uses' => 'TestimonialsController@index'
    ]);
    Route::get('create', [
        'as' => 'admin.testimonials.create',
        'uses' => 'TestimonialsController@create'
    ]);
    Route::get('{$SINGULAR_LOWER_NAME$}/edit', [
        'as' => 'admin.testimonials.edit',
        'uses' => 'TestimonialsController@edit'
    ]);
    Route::post('/', [
        'as' => 'admin.testimonials.store',
        'uses' => 'TestimonialsController@store'
    ]);
    Route::put('{$SINGULAR_LOWER_NAME$}', [
        'as' => 'admin.testimonials.update',
        'uses' => 'TestimonialsController@update'
    ]);
    Route::get('datatable', [
        'as' => 'admin.testimonials.datatable',
        'uses' => 'TestimonialsController@dataTable'
    ]);
    Route::delete('{$SINGULAR_LOWER_NAME$}', [
        'as' => 'admin.testimonials.destroy',
        'uses' => 'TestimonialsController@destroy'
    ]);
});
