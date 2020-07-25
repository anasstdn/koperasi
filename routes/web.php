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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    // return view('welcome');
    if (Auth::check()) {
        return redirect('home');
    } else {
        return redirect('login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
	Route::match(['get', 'post'],'/get-data','UserController@getData');
    Route::get('/create',['as' => 'user.create', 'uses' => 'UserController@create']);
    Route::match(['get','post'],'/store','UserController@store');
    Route::match(['get','post'],'/update','UserController@update');
	Route::match(['get', 'post'],'/check-username','UserController@checkUsername');
	Route::match(['get', 'post'],'/check-email','UserController@checkEmail');
	Route::match(['get', 'post'],'/{id}/reset','UserController@reset');
    Route::match(['get', 'post'],'/{id}/nonaktifkan','UserController@nonaktifkan');
    Route::match(['get', 'post'],'/{id}/aktifkan','UserController@aktifkan');
	Route::match(['get', 'post'],'/edit/{id}','UserController@edit');
	Route::get('/{id}/delete', 'UserController@destroy');
});

Route::prefix('activity-log')->group(function() {
    Route::get('/', 'ActivityLogController@index');
    Route::match(['get', 'post'],'/get-data','ActivityLogController@getData');
});

Route::prefix('provinsi')->group(function() {
    Route::get('/', 'ProvinsiController@index');
    Route::match(['get', 'post'],'/get-data','ProvinsiController@getData');
    Route::match(['get','post'],'/store','ProvinsiController@store');
    Route::match(['get', 'post'],'/edit/{id}','ProvinsiController@edit');
    Route::match(['get','post'],'/update','ProvinsiController@update');
    Route::get('/{id}/delete', 'ProvinsiController@destroy');
});

Route::prefix('kabupaten')->group(function() {
    Route::get('/', 'KabupatenController@index');
    Route::match(['get', 'post'],'/get-data','KabupatenController@getData');
    Route::match(['get','post'],'/store','KabupatenController@store');
    Route::match(['get', 'post'],'/edit/{id}','KabupatenController@edit');
    Route::match(['get','post'],'/update','KabupatenController@update');
    Route::get('/{id}/delete', 'KabupatenController@destroy');
});

Route::prefix('kecamatan')->group(function() {
    Route::get('/', 'KecamatanController@index');
    Route::match(['get', 'post'],'/get-data','KecamatanController@getData');
    Route::match(['get','post'],'/store','KecamatanController@store');
    Route::match(['get', 'post'],'/edit/{id}','KecamatanController@edit');
    Route::match(['get','post'],'/update','KecamatanController@update');
    Route::get('/{id}/delete', 'KecamatanController@destroy');
});

Route::prefix('kelurahan')->group(function() {
    Route::get('/', 'KelurahanController@index');
    Route::match(['get', 'post'],'/get-data','KelurahanController@getData');
    Route::match(['get','post'],'/store','KelurahanController@store');
    Route::match(['get', 'post'],'/edit/{id}','KelurahanController@edit');
    Route::match(['get','post'],'/update','KelurahanController@update');
    Route::get('/{id}/delete', 'KelurahanController@destroy');
});

Route::prefix('status-perkawinan')->group(function() {
    Route::get('/', 'StatusPerkawinanController@index');
    Route::match(['get', 'post'],'/get-data','StatusPerkawinanController@getData');
    Route::match(['get','post'],'/store','StatusPerkawinanController@store');
    Route::match(['get', 'post'],'/edit/{id}','StatusPerkawinanController@edit');
    Route::match(['get','post'],'/update','StatusPerkawinanController@update');
    Route::get('/{id}/delete', 'StatusPerkawinanController@destroy');
});

Route::prefix('agama')->group(function() {
    Route::get('/', 'AgamaController@index');
    Route::match(['get', 'post'],'/get-data','AgamaController@getData');
    Route::match(['get','post'],'/store','AgamaController@store');
    Route::match(['get', 'post'],'/edit/{id}','AgamaController@edit');
    Route::match(['get','post'],'/update','AgamaController@update');
    Route::get('/{id}/delete', 'AgamaController@destroy');
});

Route::prefix('departement')->group(function() {
    Route::get('/', 'DepartementController@index');
    Route::match(['get', 'post'],'/get-data','DepartementController@getData');
    Route::match(['get','post'],'/store','DepartementController@store');
    Route::match(['get', 'post'],'/edit/{id}','DepartementController@edit');
    Route::match(['get','post'],'/update','DepartementController@update');
    Route::get('/{id}/delete', 'DepartementController@destroy');
});

Route::prefix('golongan')->group(function() {
    Route::get('/', 'GolonganController@index');
    Route::match(['get', 'post'],'/get-data','GolonganController@getData');
    Route::match(['get','post'],'/store','GolonganController@store');
    Route::match(['get', 'post'],'/edit/{id}','GolonganController@edit');
    Route::match(['get','post'],'/update','GolonganController@update');
    Route::get('/{id}/delete', 'GolonganController@destroy');
});

Route::prefix('jabatan')->group(function() {
    Route::get('/', 'JabatanController@index');
    Route::match(['get', 'post'],'/get-data','JabatanController@getData');
    Route::match(['get','post'],'/store','JabatanController@store');
    Route::match(['get', 'post'],'/edit/{id}','JabatanController@edit');
    Route::match(['get','post'],'/update','JabatanController@update');
    Route::get('/{id}/delete', 'JabatanController@destroy');
});

Route::prefix('kategori-transaksi')->group(function() {
    Route::get('/', 'KategoriTransaksiController@index');
    Route::match(['get', 'post'],'/get-data','KategoriTransaksiController@getData');
    Route::match(['get','post'],'/store','KategoriTransaksiController@store');
    Route::match(['get', 'post'],'/edit/{id}','KategoriTransaksiController@edit');
    Route::match(['get','post'],'/update','KategoriTransaksiController@update');
    Route::get('/{id}/delete', 'KategoriTransaksiController@destroy');
});

Route::prefix('jenis-transaksi')->group(function() {
    Route::get('/', 'JenisTransaksiController@index');
    Route::match(['get', 'post'],'/get-data','JenisTransaksiController@getData');
    Route::match(['get','post'],'/store','JenisTransaksiController@store');
    Route::match(['get', 'post'],'/edit/{id}','JenisTransaksiController@edit');
    Route::match(['get','post'],'/update','JenisTransaksiController@update');
    Route::get('/{id}/delete', 'JenisTransaksiController@destroy');
});
