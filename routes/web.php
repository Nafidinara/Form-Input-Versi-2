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

Route::get('/', 'BeritaController@index_home');

Route::get('form','DokumenController@view_form');
Route::get('table','DokumenController@show_table');
Route::get('export','DokumenController@export');
Route::get('download/{dokumen_id}','DokumenController@download');
Route::post('proses-input','DokumenController@proses_input');

Route::prefix('berita')->group(function () {
    Route::get('table','BeritaController@index');
    Route::get('store','BeritaController@view_store');
    Route::post('proses-store','BeritaController@store');
    Route::get('edit/{berita_id}','BeritaController@show');
    Route::get('detail/{berita_id}','BeritaController@show_detail');
    Route::post('proses-update/{berita_id}','BeritaController@update');
});
