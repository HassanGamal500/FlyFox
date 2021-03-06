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

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home')->middleware('admin');

    Route::resource('user', 'UserController')->middleware('admin');

    Route::resource('post_user', 'PostControllerR');

    Route::resource('post', 'PostController')->middleware('admin');

});
