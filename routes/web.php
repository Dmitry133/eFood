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
    return view('welcome');
});

Route::resource('product','ProductController');
Route::resource('foodpackage','FoodpackageController');
Route::post('product/search','ProductController@search');
Route::post('foodpackage/search','FoodpackageController@search');
Route::get('cart','CartController@index');
Route::get('cart/AddItem/($id)','CartController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');
