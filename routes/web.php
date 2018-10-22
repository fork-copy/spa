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


Route::get('statuses', function () {
    dd(env('DB_'));
    return App\User::latest()->get();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
