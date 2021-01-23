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
Route::get('/vtron/posisibanjir', 'HomeController@vtronbanjir');
Route::get('/vtron/rekap', 'HomeController@vtronrekap');
Route::get('/vtron/rekapluar', 'HomeController@vtronrekapluar');
Route::get('/dapur-umum', 'HomeController@dapurUmum');
Route::get('/pengungsian', 'HomeController@pengungsian');

Route::get('/admin/dapur-umum', 'HomeController@dapurAdmin');
Route::get('/admin/pengungsianmap', 'HomeController@pengungsianAdmin');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/rekapitulasi/detail/{id}', 'RekapitulasiController@detail');
Route::get('/rekapitulasi/titik/detail/{id}', 'RekapitulasiController@titikDetail');

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/admin/json', 'DataJsonController@index');
    Route::get('/admin/json/store', 'DataJsonController@store');
    Route::get('/admin/json/json_rekap/{id}', 'DataJsonController@json_rekap');
    Route::get('/admin/json/json_rekapluar/{id}', 'DataJsonController@json_rekapluar');
    
    Route::get('/admin/json/json_rekap/print/{id}', 'DataJsonController@json_rekap_print');
    Route::get('/admin/json/json_rekapluar/print/{id}', 'DataJsonController@json_rekapluar_print');

    Route::get('/admin/json/json_dapur/{id}', 'DataJsonController@json_dapur');
    Route::get('/admin/json/json_pengungsian/{id}', 'DataJsonController@json_pengungsian');

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
    
    Route::get('/admin/galery', 'GaleryController@index');
    Route::get('/admin/galery/add', 'GaleryController@add');
    Route::post('/admin/galery/add', 'GaleryController@store');
    Route::get('/admin/galery/edit/{id}', 'GaleryController@edit');
    Route::post('/admin/galery/edit/{id}', 'GaleryController@update');
    Route::get('/admin/galery/delete/{id}', 'GaleryController@delete');

    Route::get('/admin/rekapitulasi', 'RekapitulasiController@index');
    Route::get('/admin/rekapitulasi/add', 'RekapitulasiController@add');
    Route::post('/admin/rekapitulasi/add', 'RekapitulasiController@store');
    Route::get('/admin/rekapitulasi/edit/{id}', 'RekapitulasiController@edit');
    Route::post('/admin/rekapitulasi/edit/{id}', 'RekapitulasiController@update');
    Route::get('/admin/rekapitulasi/delete/{id}', 'RekapitulasiController@delete');
    
    Route::get('/admin/rekapitulasi/json', 'RekapitulasiController@json');    
    
    Route::get('/admin/rekapitulasi_luar', 'RekapitulasiLuarController@index');
    Route::get('/admin/rekapitulasi_luar/add', 'RekapitulasiLuarController@add');
    Route::post('/admin/rekapitulasi_luar/add', 'RekapitulasiLuarController@store');
    Route::get('/admin/rekapitulasi_luar/edit/{id}', 'RekapitulasiLuarController@edit');
    Route::post('/admin/rekapitulasi_luar/edit/{id}', 'RekapitulasiLuarController@update');
    Route::get('/admin/rekapitulasi_luar/delete/{id}', 'RekapitulasiLuarController@delete');
    
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
    
    Route::get('/admin/pengungsian', 'PengungsianController@index');
    Route::get('/admin/pengungsian/add', 'PengungsianController@add');
    Route::post('/admin/pengungsian/add', 'PengungsianController@store');
    Route::get('/admin/pengungsian/edit/{id}', 'PengungsianController@edit');
    Route::post('/admin/pengungsian/edit/{id}', 'PengungsianController@update');
    Route::get('/admin/pengungsian/delete/{id}', 'PengungsianController@delete');
});