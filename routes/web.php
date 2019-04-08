<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['name' => 'Mariwin']);
});

Route::resource('jobs', 'JobController');
Route::resource('/show', 'JobController@show');

Route::resource('loadmore', 'LoadmoreController'); 
Route::resource('/show', 'LoadmoreController@show');

Route::post('loadmore/load_data', 'LoadMoreController@load_data')->name('loadmore.load_data');
