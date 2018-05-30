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

/* Laravel Default */
Route::get('/', function () {
    return view('welcome');
});


/* laravel-jp-on */
Route::get('/laravel-jp-on/index', 'LaravelJpOnController@index');

/* Laravel Auth Default */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
