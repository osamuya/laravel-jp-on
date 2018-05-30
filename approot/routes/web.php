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
/* laravel-jp-on Auth */
// Route::match(['get', 'head'],'/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('/register/confirm', 'Auth\SignupController@registerConfirm');
Route::post('/register/store', 'Auth\SignupController@registerStore');

/* Laravel Auth Default */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
