<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\IndexPageController@index')->name('home');
Route::post('/','App\Http\Controllers\IndexPageController@changeCategory')->name('changeCategory');
Route::get('/experience-details/{id}','App\Http\Controllers\IndexPageController@show')->name('experience-details');
Route::post('/addExperience','App\Http\Controllers\AddNewController@storeExp')->name('add-new-experience');

Route::get('/my-shared-experiences','App\Http\Controllers\IndexPageController@myExperiences')->name('my-experiences');
Route::post('/experiences/delete/{id}','App\Http\Controllers\IndexPageController@deleteExperience')->name('delete-experience');

Route::post('/ask-question','App\Http\Controllers\AddNewController@askQuestion')->name('ask-question');
Route::get('/recently-asked','App\Http\Controllers\IndexPageController@recentlyAsked')->name('recently-asked');
Route::get('/recently-asked/{id}','App\Http\Controllers\IndexPageController@showQuestion')->name('question-details');
require __DIR__.'/auth.php';
