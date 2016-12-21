<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'tracking', 'middleware'=>['auth']], function () {
Route::resource('database', 'DatabaseController');

Route::resource('table', 'TableController');
Route::resource('column', 'ColumnController');

Route::resource('trigger', 'TriggerController');

Route::get('/table/create/{id}', 'TableController@create');

Route::get('/column/create/{id}', 'ColumnController@create');


Route::get('/trigger/create/{id}', 'TriggerController@create');



Route::get('/database/export/{id}',[
'middleware' => ['auth'],
'as' => 'database.export',
'uses' => 'DatabaseController@export_database'
] );

Route::get('/database/export-trigger/{id}',[
'middleware' => ['auth'],
'as' => 'database.export-trigger',
'uses' => 'DatabaseController@export_trigger'
] );

Route::get('/trigger/isi/{id}',[
'middleware' => ['auth'],
'as' => 'trigger.isi',
'uses' => 'TriggerController@isi'
] );


});
