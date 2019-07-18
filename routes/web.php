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


Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/index', 'UserController@index')->name('user.index');
    Route::get('/favourites', 'UserController@favourites')->name('user.favourites');
    Route::get('/search/{search_text?}', 'UserController@search')->name('user.search');
    Route::get('/action/favourite/{user}', 'UserController@favouriteAction')->name('user.action.favourite');
    Route::get('/action/sort/{sort}', 'UserController@sortAction')->name('user.action.sort');
});
