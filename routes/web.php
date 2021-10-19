<?php

use Illuminate\Support\Facades\Http;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

//route CRUD
//Route::get('/pegawai','PegawaiController@index');
Route::get('/pegawai','App\Http\Controllers\PegawaiController@index');
Route::get('/pegawai/tambah','App\Http\Controllers\PegawaiController@tambah');
Route::post('/pegawai/store','App\Http\Controllers\PegawaiController@store');
//Route::post('/pegawai/search','App\Http\Controllers\PegawaiController@search');
Route::get('/pegawai/cari','App\Http\Controllers\PegawaiController@cari');
Route::get('/perkara','App\Http\Controllers\PerkaraController@index');
Route::get('/perkara/cari','App\Http\Controllers\PerkaraController@cari');
Route::get('/kirimemail','App\Http\Controllers\MalasngodingController@index');
Route::get('/requestsalinan','App\Http\Controllers\RequestSalinanController@index');
Route::post('/requestsalinan/cari','App\Http\Controllers\RequestSalinanController@cari')->name('cari');
Route::get('/autosearch','App\Http\Controllers\SearchController@index');
Route::get('/autosearch/autocomplete','App\Http\Controllers\SearchController@autocomplete')->name('autocomplete');

Route::get('/input','App\Http\Controllers\ValidatorController@input');
//Route::post('requestsalinan/proses','App\Http\Controllers\ValidatorController@proses');
Route::post('requestsalinan/proses','App\Http\Controllers\RequestSalinanController@proses');

Route::get('/pesan','App\Http\Controllers\NotifController@index');
Route::get('/pesan/sukses','App\Http\Controllers\NotifController@sukses');
Route::get('/pesan/peringatan','App\Http\Controllers\NotifController@peringatan');
Route::get('/pesan/gagal','App\Http\Controllers\NotifController@gagal');
