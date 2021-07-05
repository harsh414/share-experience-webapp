<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\IndexPageController@index')->name('home');
Route::post('/','App\Http\Controllers\IndexPageController@changeCategory')->name('changeCategory');
Route::get('/experience-details/{id}','App\Http\Controllers\IndexPageController@show')->name('experience-details');
Route::post('/addExperience','App\Http\Controllers\AddNewController@storeExp')->name('add-new-experience');

Route::get('/my-shared-experiences','App\Http\Controllers\IndexPageController@myExperiences')->name('my-experiences');
Route::post('/experiences/delete/{id}','App\Http\Controllers\IndexPageController@deleteExperience')->name('delete-experience');

Route::get('/recently-asked','App\Http\Controllers\IndexPageController@recentlyAsked')->name('recently-asked');
//Route::post('/my-shared-experiences/delete/{id}','App\Http\Controllers\IndexPageController@deleteExperience')->name('delete-experience');
require __DIR__.'/auth.php';
