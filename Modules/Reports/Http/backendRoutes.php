<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'reports'], function () {
    Route::get('/', [
        'as' => 'admin.reports.index',
        'uses' => 'ReportsController@index'
    ]);
});
