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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa','SiswaController@index');
Route::post('/siswa/create','SiswaController@create');
Route::get('/siswa/{id}/edit','SiswaController@edit');
Route::post('/siswa/{id}/update','SiswaController@update');
Route::get('/siswa/{id}/delete','SiswaController@delete');

Route::get('/absensi/testtime','AbsensiController@testtime');
Route::get('/absensi','AbsensiController@absensi');
Route::get('/absensi/tambah','AbsensiController@tambah');
Route::post('/absensi/store','AbsensiController@store');
Route::get('/absensi/edit/{id}','AbsensiController@edit');
Route::post('/absensi/update/{id}','AbsensiController@update');
Route::post('/absensi/delete','AbsensiController@delete');
