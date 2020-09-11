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

Route::get('/','HomeController@index')->name('dashboard');;

Auth::routes();
Route::resource('cities', 'CityController');
Route::resource('hotels', 'HotelController');
Route::resource('activities', 'ActivityController');
Route::resource('cityimages', 'CityImageController');
Route::resource('hotelimages', 'HotelImageController');


