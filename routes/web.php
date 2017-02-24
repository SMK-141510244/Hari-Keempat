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

//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['api'],'prefix' => 'api'], function () {
    Route::post('register', 'APIController@register');
    Route::post('login', 'APIController@login');

    Route::group(['middleware' => 'jwt-auth'], function () {
    	Route::post('get_user_details', 'APIController@get_user_details');
    });
});

Route::resource('JABATAN', 'JabatanController');
Route::resource('GOLONGAN', 'GolonganController');
Route::resource('KATEGORI', 'Kategori_lemburController');
Route::resource('PEGAWAI', 'PegawaiController');
Route::resource('LEMBUR', 'Lembur_PegawaiController');
Route::resource('TUNJANGAN', 'TunjanganController');
Route::resource('TUNJANGANPEG', 'Tunjangan_PegawaiController');
Route::resource('PENGGAJIAN', 'PenggajianController');
Route::get('query', 'PenggajianController@search');