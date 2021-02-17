<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', 'mahasiswa1Controller@index'); 
//Mahasiswa (Route dengan detail satu persatu) 
Route::get('/mhs', 'mahasiswa1Controller@index')->name('mhs.index'); 
Route::get('/mhs/list', 'mahasiswa1Controller@mhs_list')->name('mhs.list'); 
Route::get('/mhs/create', 'mahasiswa1Controller@create'); 
Route::post('/mhs/store', 'mahasiswa1Controller@store'); 
Route::get('/mhs/edit/{nim}', 'mahasiswa1Controller@edit'); 
Route::put('/mhs/update/{mahasiswa:nim}', 'mahasiswa1Controller@update')->name('mhs.update'); 
Route::get('/mhs/delete/{mahasiswa:nim}', 'mahasiswa1Controller@destroy')->name('mhs.delete'); 
//Prodi (Route Framework) 
Route::resource('/prodi', 'prodi1Controller');

Route::get('/', 'dosenController@index'); 
//Mahasiswa (Route dengan detail satu persatu) 
Route::get('/dsn', 'dosenController@index')->name('dsn.index'); 
Route::get('/dsn/list', 'dosenController@dsn_list')->name('dsn.list'); 
Route::get('/dsn/create', 'dosenController@create'); 
Route::post('/dsn/store', 'dosenController@store'); 
Route::get('/dsn/edit/{nid}', 'dosenController@edit'); 
Route::put('/dsn/update/{dosen:nid}', 'dosenController@update')->name('dsn.update'); 
Route::get('/dsn/delete/{dosen:nid}', 'dosenController@destroy')->name('dsn.delete'); 
//Prodi (Route Framework)
Route::resource('/mk', 'mkController');


Route::get('/', 'mkController@index'); 
//Mahasiswa (Route dengan detail satu persatu)
Route::get('/matakuliah', 'mkController@index')->name('matakuliah.index'); 
Route::get('/matakuliah/list', 'mkController@matakuliah_list')->name('matakuliah.list'); 
Route::get('/matakuliah/create', 'mkController@create'); 
Route::post('/matakuliah/store', 'mkController@store'); 
Route::get('/matakuliah/{kode_mk}/edit', 'mkController@edit'); 
Route::put('/matakuliah/{kode_mk}/update', 'mkController@update')->name('matakuliah.update'); 
Route::delete('/matakuliah/{kode_mk}', 'mkController@destroy')->name('matakuliah.delete'); 
