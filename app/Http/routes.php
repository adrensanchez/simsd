<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['uses'=>'LoginController@index', 'as' => 'login']);
Route::post('/',['uses'=>'LoginController@postLogin', 'as' => 'login']);

Route::group(['prefix' => 'matpel'], function(){
	route::get('/',['uses'=>'MatpelController@index', 'as' => 'matpel.index']);
	route::get('/tambah',['uses'=>'MatpelController@add', 'as' => 'matpel.add']);
	route::get('/edit/{id}',['uses'=>'MatpelController@edit', 'as' => 'matpel.edit']);
	route::post('/edit/{id}',['uses'=>'MatpelController@update', 'as' => 'matpel.update']);
	route::get('/delete/{id}',['uses'=>'MatpelController@delete', 'as' => 'matpel.delete']);
	route::post('/tambah',['uses'=>'MatpelController@store', 'as' => 'matpel.store']);
});

Route::group(['prefix' => 'guru'], function(){
	route::get('/',['uses' => 'GuruController@index', 'as' => 'guru.index']);
	route::get('/tambah',['uses' => 'GuruController@add', 'as' => 'guru.add']);
	route::post('/tambah',['uses' => 'GuruController@store', 'as' => 'guru.store']);
	route::get('/edit/{id}',['uses' => 'GuruController@edit', 'as' => 'guru.edit']);
	route::post('/edit/{id}',['uses' => 'GuruController@update', 'as' => 'guru.update']);
	route::delete('/delete/{id}',['uses' => 'GuruController@delete', 'as' => 'guru.delete']);
});

route::group(['prefix' => 'kelas'], function(){
	route::get('/',['uses' => 'KelasController@index', 'as' => 'kelas.index']);
	route::get('/tambah',['uses' => 'KelasController@add', 'as' => 'kelas.add']);
	route::post('/tambah',['uses' => 'KelasController@store', 'as' => 'kelas.store']);
	route::get('/edit/{id}',['uses' => 'KelasController@edit', 'as' => 'kelas.edit']);
	route::post('/edit/{id}',['uses' => 'KelasController@update', 'as' => 'kelas.update']);
	route::delete('/delete/{id}',['uses' => 'KelasController@delete', 'as' => 'kelas.delete']);
});

route::group(['prefix' => 'siswa'], function(){
	route::get('/',['uses' => 'SiswaController@index', 'as' => 'siswa.index']);
	route::get('/tambah',['uses' => 'SiswaController@add', 'as' => 'siswa.add']);
	route::post('/tambah',['uses' => 'SiswaController@store', 'as' => 'siswa.store']);
	route::get('/edit/{id}',['uses' => 'SiswaController@edit', 'as' => 'siswa.edit']);
	route::post('/edit/{id}',['uses' => 'SiswaController@update', 'as' => 'siswa.update']);
	route::delete('/delete/{id}',['uses' => 'SiswaController@delete', 'as' => 'siswa.delete']);
	route::get('/pdf',['uses' => 'SiswaController@pdf', 'as' => 'siswa.pdf']);
});