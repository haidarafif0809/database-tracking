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

Route::get('/database/backup',[
'middleware' => ['auth'],
'as' => 'database.backup',
'uses' => 'DatabaseController@backup_database'
] );

Route::get('/database/upload-sample/{id}',[
'middleware' => ['auth'],
'as' => 'database.upload',
'uses' => 'DatabaseController@upload_sample'
] );

Route::get('/sql/{id}',[
'middleware' => ['auth'],
'as' => 'database.download',
'uses' => 'DatabaseController@download_sample'
] );


Route::get('/bug/status/{id}',[
'middleware' => ['auth'],
'as' => 'bug.status',
'uses' => 'BugController@status_bug'
] );


Route::get('/bug/aplikasi/{id}',[
'middleware' => ['auth'],
'as' => 'bug.aplikasi',
'uses' => 'BugController@aplikasi_bug'
] );


Route::post('/database/upload-sample',[
'middleware' => ['auth'],
'as' => 'database.upload-proses',
'uses' => 'DatabaseController@upload_sample_store'
] );


Route::post('/database/backup',[
'middleware' => ['auth'],
'as' => 'backup.store',
'uses' => 'DatabaseController@store_backup'
] );


Route::get('/database/isi-backup/{id}',[
'middleware' => ['auth'],
'as' => 'database.backup-isi',
'uses' => 'DatabaseController@isi_backup'
] );

Route::get('/database/backup/create',[
'middleware' => ['auth'],
'as' => 'backup.create',
'uses' => 'DatabaseController@create_backup'
] );


Route::get('/ssh','DatabaseController@ssh');

Auth::routes();

Route::get('/telegram', 'DatabaseController@telegram');

Route::get('/home', 'HomeController@index');

Route::get('/telegram', 'DatabaseController@telegram');
Route::group(['prefix'=>'installer', 'middleware'=>['auth']], function () {
Route::resource('install-aplikasi', 'InstallAplikasiController');
});
Route::group(['prefix'=>'bug', 'middleware'=>['auth']], function () {

	Route::resource('aplikasi', 'AplikasiController');

Route::resource('list', 'BugController');
Route::resource('komentar', 'KomentarController');

Route::get('/on-hold/{id}',[
'middleware' => ['auth'],
'as' => 'bug.onhold',
'uses' => 'BugController@on_hold'
] );

Route::get('/deskripsi/{id}',[
'middleware' => ['auth'],
'as' => 'bug.deskripsi',
'uses' => 'BugController@deskripsi'
] );

Route::get('/finish-debug/{id}',[
'middleware' => ['auth'],
'as' => 'bug.finish_debug',
'uses' => 'BugController@finish_debug'
] );



Route::get('/still-has/{id}',[
'middleware' => ['auth'],
'as' => 'bug.still_has',
'uses' => 'BugController@still_has'
] );

Route::get('/finish-testing/{id}',[
'middleware' => ['auth'],
'as' => 'bug.finish_testing',
'uses' => 'BugController@finish_testing'
] );






});
Route::group(['prefix'=>'tracking', 'middleware'=>['auth']], function () {
	
Route::resource('database', 'DatabaseController');

Route::resource('table', 'TableController');
Route::resource('column', 'ColumnController');


Route::resource('trigger', 'TriggerController');

Route::get('/table/create/{id}', 'TableController@create');

Route::get('/column/create/{id}', 'ColumnController@create');


Route::get('/trigger/create/{id}', 'TriggerController@create');

Route::get('/history',[
'middleware' => ['auth'],
'as' => 'database.history',
'uses' => 'DatabaseController@history'
] );


Route::get('/database/export/{id}',[
'middleware' => ['auth'],
'as' => 'database.export',
'uses' => 'DatabaseController@export_database'
] );

Route::get('/table/sample/{id}',[
'middleware' => ['auth'],
'as' => 'table.sample',
'uses' => 'TableController@sample_data'
] );



Route::get('/table/sample/create/{id}',[
'middleware' => ['auth'],
'as' => 'sample.create',
'uses' => 'TableController@create_sample_data'
] );

Route::post('/table/sample/create',[
'middleware' => ['auth'],
'as' => 'table.tambah_sample',
'uses' => 'TableController@store_sample_data'
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

Auth::routes();

Route::get('/home', 'HomeController@index');
