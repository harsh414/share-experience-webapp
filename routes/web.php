<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\IndexPageController@index')->name('home');
Route::post('/','App\Http\Controllers\IndexPageController@changeCategory')->name('changeCategory');
Route::get('/experience-details/{id}','App\Http\Controllers\IndexPageController@show')->name('experience-details');
Route::post('/addExperience','App\Http\Controllers\AddNewController@storeExp')->name('add-new-experience');
require __DIR__.'/auth.php';
