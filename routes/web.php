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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('/Home', 'StartController@Index')->name('home');
	Route::get('/home', 'StartController@Index');
	Route::post('/Home/Add', 'StartController@Add')->name('addBookmark');
	Route::get('/Home/Remove/{id}', 'StartController@Remove');
});
