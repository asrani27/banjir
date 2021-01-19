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

Route::get('/', 'HomeController@index');
Route::get('/dapur-umum', 'HomeController@dapurUmum');
Route::get('/pengungsian', 'HomeController@pengungsian');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@home');
    Route::get('/logout', 'LoginController@logout');

    Route::get('/admin/kecamatan', 'KecamatanController@index');
    Route::get('/admin/kecamatan/{id}/createuser', 'KecamatanController@createuser');
    Route::post('/admin/kecamatan/{id}/createuser', 'KecamatanController@storeuser');
    Route::get('/admin/kecamatan/add', 'KecamatanController@add');
    Route::post('/admin/kecamatan/add', 'KecamatanController@store');
    Route::get('/admin/kecamatan/edit/{id}', 'KecamatanController@edit');
    Route::post('/admin/kecamatan/edit/{id}', 'KecamatanController@update');
    Route::get('/admin/kecamatan/delete/{id}', 'KecamatanController@delete');

    Route::get('/admin/kelurahan', 'KelurahanController@index');
    Route::get('/admin/kelurahan/{id}/createuser', 'KelurahanController@createuser');
    Route::post('/admin/kelurahan/{id}/createuser', 'KelurahanController@storeuser');
    Route::get('/admin/kelurahan/add', 'KelurahanController@add');
    Route::post('/admin/kelurahan/add', 'KelurahanController@store');
    Route::get('/admin/kelurahan/edit/{id}', 'KelurahanController@edit');
    Route::post('/admin/kelurahan/edit/{id}', 'KelurahanController@update');
    Route::get('/admin/kelurahan/delete/{id}', 'KelurahanController@delete');
    
    Route::get('/admin/lokasi', 'LokasiController@index');
    Route::get('/admin/lokasi/add', 'LokasiController@add');
    Route::post('/admin/lokasi/add', 'LokasiController@store');
    Route::get('/admin/lokasi/edit/{id}', 'LokasiController@edit');
    Route::post('/admin/lokasi/edit/{id}', 'LokasiController@update');
    Route::get('/admin/lokasi/delete/{id}', 'LokasiController@delete');
    
    Route::get('/admin/rekapitulasi', 'RekapitulasiController@index');
    Route::get('/admin/rekapitulasi/add', 'RekapitulasiController@add');
    Route::post('/admin/rekapitulasi/add', 'RekapitulasiController@store');
    Route::get('/admin/rekapitulasi/edit/{id}', 'RekapitulasiController@edit');
    Route::post('/admin/rekapitulasi/edit/{id}', 'RekapitulasiController@update');
    Route::get('/admin/rekapitulasi/delete/{id}', 'RekapitulasiController@delete');
    
    Route::get('/admin/banjir', 'BanjirController@index');
    Route::get('/admin/banjir/add', 'BanjirController@add');
    Route::post('/admin/banjir/add', 'BanjirController@store');
    Route::get('/admin/banjir/edit/{id}', 'BanjirController@edit');
    Route::post('/admin/banjir/edit/{id}', 'BanjirController@update');
    Route::get('/admin/banjir/delete/{id}', 'BanjirController@delete');
    
    Route::get('/admin/dapur', 'DapurController@index');
    Route::get('/admin/dapur/add', 'DapurController@add');
    Route::post('/admin/dapur/add', 'DapurController@store');
    Route::get('/admin/dapur/edit/{id}', 'DapurController@edit');
    Route::post('/admin/dapur/edit/{id}', 'DapurController@update');
    Route::get('/admin/dapur/delete/{id}', 'DapurController@delete');
});