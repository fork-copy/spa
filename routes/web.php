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

Route::get('/', ['as' => 'vocabularies', 'uses' => 'VocabularyController@show']);


Route::get('getVocabularies', function () {
    return App\Vocabulary::latest()->get();
    //return App\Vocabulary::with('user')->latest()->get();
});

Auth::routes();

Route::get('/home', 'VocabularyController@index');
Route::get('/vocabularies', ['as' => 'vocabularies', 'uses' => 'VocabularyController@index']);
Route::get('/vocabularies/create', ['as' => 'vocabularies.create', 'uses' => 'VocabularyController@create']);
Route::post('/vocabularies/store', ['as' => 'vocabularies.store', 'uses' => 'VocabularyController@store']);
Route::get('/vocabularies/edit/{id}', ['as' => 'vocabularies.edit', 'uses' => 'VocabularyController@edit']);
Route::post('/vocabularies/update/{id}', ['as' => 'vocabularies.update', 'uses' => 'VocabularyController@update']);
Route::delete('/vocabularies/destroy/{id}', ['as' => 'vocabularies.destroy', 'uses' => 'VocabularyController@destroy']);
