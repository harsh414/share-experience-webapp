<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\IndexPageController@index');
Route::get('/experience-details/{id}','App\Http\Controllers\IndexPageController@show')->name('experience-details');
require __DIR__.'/auth.php';
